<?php
//程序名：WorkController.php
//功能：创建申报作品
//被调用程序名：调用程序名：
//安全等级：2级
//编程人：常元检 15649841368
//测试人：李孝川 18839965525
namespace App\Http\Controllers;
use App\Work;
use App\WorkStatus;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $parser = new \Smalot\PdfParser\Parser();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        if($id==1)
            return view('form.work_info1');
        if($id==2)
            return view('form.work_info2');
        if($id==3)
            return view('form.work_info3');
        if($id==4)
            return view('form.work_info4');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $input = $request->all();
        $userId = Auth::user()['id'];
        $work = Work::where('user_id',$userId)->first();
        //判断是否已经存在记录
        if($work==null){
            $id['user_id'] = $userId;
            Work::create($id);
        }
        $work = Work::where('user_id',$userId)->first();
        //判断来自第几个项目信息页面
        if($input['info_id']=='1'){
            $name= $input['name'];
            $big_class = $input['big_class'];
            $small_class = $input['small_class'];
            $a =DB::update('update work set name=?,big_class=?,small_class=? where user_id=?',[$name,$big_class,$small_class,$userId]);
            return redirect('/work/create/2');
        }
        if($input['info_id']=='2'){
            $aim = $input['aim'];
            $brief =$input['brief'];
            $detailed =$input['detailed'];
            $a = DB::update('update work set aim=?,brief=?,detailed=? where user_id=?',[$aim,$brief,$detailed,$userId]);
            return redirect('/work/create/3');
        }
        if($input['info_id']=='3'){
            //判断请求中是否存在文件，如果存在则保存文件，否则存储为null
            if ($request->hasFile('materials')&&$request->hasFile('document')) {
                $fileName1 = 'document'.'_'.$userId;
                $fileName2 = 'materials'.'_'.$userId;
                $path1 = 'file/document/';
                $path2 = 'file/materials';
                $request->file('document')->move($path1,$fileName1.'.pdf');
                $request->file('materials')->move($path2,$fileName2.'.pdf');
                $document_address = $fileName1;
                $materials_address = $fileName2;
                $a = DB::update('update work set document_address=?,materials_address=? where user_id=?',[$document_address,$materials_address,$userId]);
            }
            return redirect('/work/create/4');
        }
        if($input['info_id']=='4'){
            //判断请求中是否存在文件，如果存在则保存文件，否则存储为null
            if ($request->hasFile('image')&&$request->hasFile('video')){
                $fileName1 = 'image'.'_'.$userId;
                $fileName2 = 'video'.'_'.$userId;
                $path1 = 'file/image/';
                $path2 = 'file/video/';
                $request->file('image')->move($path1,$fileName1.'.jpg');
                $request->file('video')->move($path2,$fileName2.'.mp4');
                $image_address = $fileName1;
                $video_address = $fileName2;
                $a = DB::update('update work set image_address=?,video_address=? where user_id=?',[$image_address,$video_address,$userId]);
            }
        }

        //存储作品后设置作品状态为schoolwait
        //根据userId获取workId
        $work = Work::where('user_id',$userId)->first();
        $workId = $work['id'];
        //根据workId 设置WorkStatus
        $workStatus['work_id'] = $workId;
        $workStatus['status'] = 'schoolWait';
        WorkStatus::create($workStatus);

        //填写完成所有资料，跳转到填写成功的页面
        return redirect('/work/storeSuccess');
    }

    public function storeSuccess(){
        return view('form.storeSuccess');
    }

    //用户查询自己的作品状态
    public function queryStatus(){
        $userId = Auth::user()['id'];
        $status = DB::select('SELECT status FROM work_status WHERE work_id = (SELECT id FROM WORK WHERE user_id =?)',[$userId])[0]->status;
        return view('form.queryStatus',compact('status'));
    }
}
