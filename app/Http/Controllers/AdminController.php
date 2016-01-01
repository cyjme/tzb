<?php
//程序名：AdminController.php
//功能：设置、判断管理员身份
//被调用程序名：调用程序名：
//安全等级：1级（重要，权限控制）
//编程人：常元检 15649841368
//测试人：李孝川 18839965525
namespace App\Http\Controllers;

use App\User;
use App\UserPower;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //设置管理员
    public function setAdmin(){
        //获取已有的管理员
        $schoolAdmins = DB::select('SELECT name,email FROM users WHERE id IN(SELECT user_id FROM user_power WHERE(is_admin= ?))',['school']);
        $provinceAdmins = DB::select('SELECT name,email FROM users WHERE id IN(SELECT user_id FROM user_power WHERE(is_admin=?))',['province']);
        return view('admin/setAdmin',compact('schoolAdmins','provinceAdmins'));
    }

    //添加管理员
    public function addAdmin(Request $request){
        $input = $request->all();
        $email = $input['email'];
        $school = $input['school'];
        //获取该email对应的userid
        $userId = DB::select('select id from users WHERE(email = ?)',[$email]);
        $data['user_id'] = $userId[0]->id;
        $data['is_admin'] = 'school';
        $data['school'] = $school;
        UserPower::create($data);
    }

    public function judge(){
        //获取当前登录用户id，判断当前用户的身份，是否为管理员
        $userId = Auth::user()['id'];
        $power = DB::select('select is_admin from user_power where(user_id = ?)',[$userId]);
        if(count($power)>0)
        {
            if($power[0]->is_admin=='school')
            {
                return redirect('/admin/schoolIndex');
            } elseif($power[0]->is_admin=='province')
            {
                return redirect('/admin/provinceIndex');
            }
            else
                return redirect('/');
        }
        else
            return redirect('/');
    }
}
