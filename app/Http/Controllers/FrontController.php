<?php
//程序名：FrontController.php
//功能：给网站首页提供数据
//被调用程序名：调用程序名：
//安全等级：2级
//编程人：常元检 15649841368
//测试人：李孝川 18839965525
namespace App\Http\Controllers;

use App\Applicant;
use App\Partner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $news = DB::select('SELECT * FROM articles WHERE TYPE=? limit 7',['news']);
        $notices = DB::select('SELECT * FROM articles WHERE TYPE=? limit 7',['notice']);
        $knows = DB::select('SELECT * FROM articles WHERE TYPE=? limit 8',['know']);
        $shows = DB::select('SELECT * FROM articles WHERE TYPE=? limit 8',['show']);
        $banners = DB::select('SELECT * FROM articles WHERE TYPE=? limit 8',['banner']);

        //判断用户是否登录，若登录，判断有没有填写申报信息
        if(Auth::check()){
            $user_id = Auth::user()['id'];
            $a = DB::select('SELECT * FROM WORK WHERE user_id =?',[$user_id]);
            if($a == null)
                //使用status 用来标注有没有创建项目
                $status =0;
            else
                $status =1;
        }
        return view('front.index',compact('news','notices','knows','shows','banners','status'));
    }


    //查看文章详情
    public function query($id){
        $article = DB::select('SELECT * FROM articles WHERE id =?',[$id])[0];
        dd($article);
        return view('');
    }


}
