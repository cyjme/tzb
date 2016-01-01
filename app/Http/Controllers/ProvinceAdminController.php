<?php
//程序名：ProvinceAdminController.php
//功能：省团委后台管理
//被调用程序名：调用程序名：
//安全等级：1级
//编程人：常元检 15649841368
//测试人：李孝川 18839965525
namespace App\Http\Controllers;

use App\Article;
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
        return view('pages.provinceIndex');
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

    //查看待审核作品
    public function wait(){

    }
    //查看已通过作品
    public function pass(){

    }
    //设置作品状态
    public function setStatus(){

    }
    //进行评奖
    public function setAwards(){

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
        $fenlei['a'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['类别一'])[0]->number;
        $fenlei['b'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['类别二'])[0]->number;
        $fenlei['c'] = DB::select('SELECT count(*) as number FROM specialist WHERE class =?',['类别三'])[0]->number;
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
