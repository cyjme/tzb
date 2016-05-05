<?php
//��������FrontController.php
//���ܣ�����վ��ҳ�ṩ����
//�����ó����������ó�������
//��ȫ�ȼ���2��
//����ˣ���Ԫ�� 15649841368
//�����ˣ���Т�� 18839965525
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
			$news = DB::select('SELECT * FROM articles WHERE TYPE=? limit 7', ['news']);
			$notices = DB::select('SELECT * FROM articles WHERE TYPE=? limit 7', ['notice']);
			$knows = DB::select('SELECT * FROM articles WHERE TYPE=? limit 8', ['know']);
			$shows = DB::select('SELECT * FROM articles WHERE TYPE=? limit 8', ['show']);
			$banners = DB::select('SELECT * FROM articles WHERE TYPE=? limit 8', ['banner']);

        //�ж��û��Ƿ��¼������¼���ж���û����д�걨��Ϣ
        if(Auth::check()){
            $user_id = Auth::user()['id'];
            $a = DB::select('SELECT * FROM WORK WHERE user_id =?',[$user_id]);
            if($a == null)
                //ʹ��status ������ע��û�д�����Ŀ
                $status =0;
            else
                $status =1;
        }
        return view('front.index',compact('news','notices','knows','shows','banners','status'));
    }


    //�鿴��������
    public function query($id){
        $article = DB::select('SELECT * FROM articles WHERE id =?',[$id])[0];
        dd($article);
        return view('');
    }


}
