<?php
//程序名：ProvinceAdminController.php
//功能：省团委后台管理
//被调用程序名：调用程序名：
//安全等级：1级
//编程人：常元检 15649841368
//测试人：李孝川 18839965525
namespace App\Http\Controllers;

use App\Article;
use App\Award;
use App\Information;
use App\Specialist;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProvinceAdminController extends Controller
{
    //省团委管理首页
    public function index(){
        $data['zirannumber'] = DB::select('SELECT count(*) as count  FROM pdfwork WHERE big_class=?',['自然科学类学术论文'])[0]->count;
        $data['zhexuenumber'] = DB::select('SELECT count(*) as count FROM pdfwork WHERE big_class=?',['哲学社会科学类社会调查报告和学术论文'])[0]->count;
        $data['kejianumber'] = DB::select('SELECT count(*) as count FROM pdfwork WHERE big_class=?',['科技发明制作Α类'])[0]->count;
        $data['kejibnumber'] = DB::select('SELECT count(*) as count FROM pdfwork WHERE big_class=?',['科技发明制作Β类'])[0]->count;
        $schools = DB::select('SELECT school,COUNT(*) AS COUNT FROM pdfwork GROUP BY school ORDER BY COUNT DESC');
        return view('pages.provinceIndex',compact('data','schools'));
    }


    //发布新文章
    public function newArticle(){
        return view('pages.newArticle');
    }
    //发布文章
    public function articleStore(Request $request){
        $input = $request->all();
        $fileName = uniqid();
        $path = 'articles/img/';
        $request->file('img')->move($path,$fileName.'.png');
        $input['img'] = $fileName;
        Article::create($input);
        return redirect('/admin/articleSuccess');
    }
    //文章存储成功
    public function articleStoreSuccess(){
        return view('pages.ArticleStoreSuccess');
    }

    //查看自然类作品
    public function ziran(){
        $datas = DB::select('SELECT * FROM pdfwork WHERE big_class=?',['自然科学类学术论文']);
        return view('province.ziran',compact('datas'));
    }
    //查看哲学类作品
    public function zhexue(){
        $datas = DB::select('SELECT * FROM pdfwork WHERE big_class=?',['哲学社会科学类社会调查报告和学术论文']);
        return view('province.zhexue',compact('datas'));
    }
    //查看科技A类
    public function kejia(){
        $datas = DB::select('SELECT * FROM pdfwork WHERE big_class=?',['科技发明制作Α类']);
        return view('province.kejia',compact('datas'));

    }
    //查看科技B类
    public function kejib(){
        $datas = DB::select('SELECT * FROM pdfwork WHERE big_class=?',['科技发明制作Β类']);
        return view('province.kejib',compact('datas'));
    }

    //查看作品详情
    public function query($id){
        $data = DB::select('SELECT * FROM pdfwork WHERE id =?',[$id])[0];
        return view('province.query',compact('data'));
    }

    //设置作品奖项
    public function setReward(Request $request){
        $input = $request->all();
        $data['work_id'] = $input['workId'];
        $data['province_award'] = $input['award'];
        Award::create($data);
    }
    //评奖
    public function award(){
        return view('province.award');
    }
    //查看得奖情况
    public function queryAward(){
        $data['firstNumber']=DB::select('SELECT COUNT(*) AS COUNT FROM award WHERE province_award=?',['yi'])[0]->COUNT;
        $data['secondNumber']=DB::select('SELECT COUNT(*) AS COUNT FROM award WHERE province_award=?',['er'])[0]->COUNT;
        $data['threeNumber']=DB::select('SELECT COUNT(*) AS COUNT FROM award WHERE province_award=?',['san'])[0]->COUNT;
//        $data['noAwardNumber']=DB::select('SELECT COUNT(*) AS COUNT FROM award WHERE province_award=?',[''])[0]->COUNT;
        $awards=DB::select('SELECT school ,COUNT(*) as COUNT FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id GROUP BY school DESC');
        $data['ziran'] = DB::select('SELECT COUNT(*) AS COUNT FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE big_class=?',['自然科学类学术论文'])[0]->COUNT;
        $data['zhexue'] = DB::select('SELECT COUNT(*) AS COUNT FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE big_class=?',['哲学社会科学类社会调查报告和学术论文'])[0]->COUNT;
        $data['kejia'] = DB::select('SELECT COUNT(*) AS COUNT FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE big_class=?',['科技发明制作Α类'])[0]->COUNT;
        $data['kejib'] = DB::select('SELECT COUNT(*) AS COUNT FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE big_class=?',['科技发明制作Β类'])[0]->COUNT;
        return view('province.queryAward',compact('data','awards'));
    }
    public function queryAwardFirst(){
        $datas = DB::select('SELECT *,pdfwork.id AS workId FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE province_award=?',['yi']);
        return view('province.queryAwardFirst',compact('datas'));
    }
    public function queryAwardSecond(){
        $datas = DB::select('SELECT *,pdfwork.id AS workId FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE province_award=?',['er']);
        return view('province.queryAwardFirst',compact('datas'));
    }
    public function queryAwardThree(){
        $datas = DB::select('SELECT *,pdfwork.id AS workId FROM award LEFT JOIN pdfwork ON award.work_id = pdfwork.id WHERE province_award=?',['san']);
        return view('province.queryAwardFirst',compact('datas'));
    }
    //设置作品状态
    public function setStatus(){

    }
    //作品统计
    public function workStatistics(){

    }
    //添加专家
    public function addSpecialist(){
        return view('pages.addSpecialist');
    }
    //存储专家信息
    public function storeSpecialist(Request $request){
        $input = $request->all();
        Specialist::create($input);
            return redirect('/admin/storeSpecialistSuccess');
    }
    //存储专家成功
    public function storeSpecialistSuccess(){
        return view('pages.storeSpecialistSuccess');
    }
    //专家信息统计
    public function specialistStatistics(){
        $datas = DB::select('SELECT * FROM specialist');
        $fenlei['ziran'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['自然科学类学术论文'])[0]->number;
        $fenlei['zhexue'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['哲学社会科学类社会调查报告和学术论文'])[0]->number;
        $fenlei['kejia'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['科技发明制作A'])[0]->number;
        $fenlei['kejib'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['科技发明制作B'])[0]->number;
        return view('pages.specialistStatistics',compact('datas','fenlei'));
    }
    //发送内部通知
    public function sendInformation(){
        return view('pages.sendInformation');
    }
    //保存内部通知
    public function storeInformation(Request $request){
        $input = $request->all();
        Information::create($input);
        return redirect('/admin/successSend');
    }
    //内部通知发送成功
    public function successSend(){
        return view('pages.sendInformationsuccess');
    }
}
