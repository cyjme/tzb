<?php
//程序名：SchoolAdminController.php
//功能：校团委管理后台
//被调用程序名：调用程序名：
//安全等级：2级
//编程人：常元检 15649841368
//测试人：李孝川 18839965525
namespace App\Http\Controllers;

use App\WorkStatus;




use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;
use Illuminate\Http\Request;
class SchoolAdminController extends Controller
{
    //学校后台首页
    public function index(){
        //获取当前管理员用户的id,进入user-power表获取 所管理的学校。
        $userId = Auth::user()['id'];
        $school = DB::select('SELECT school FROM user_power WHERE (user_id=?)',[$userId])[0]->school;

        $infos = DB::select('select * from information ');
        return view('pages.schoolIndex',compact('infos'));
    }

    //查看通知详情
    public function queryInfo($id){
        $data = DB::select('SELECT * FROM information WHERE id =?',[$id])[0];
        return view('school.queryInfo',compact('data'));
    }

    //上报信息到省团委
    public function up(){
        return view('pages.schoolUp');
    }
    //上报信息即将作品状态设置为provinceWait
    public function upStore(){
        //获取当前管理员用户的id,进入user-power表获取 所管理的学校。
        $userId = Auth::user()['id'];
        $school = DB::select('SELECT school FROM user_power WHERE (user_id=?)',[$userId])[0]->school;
        $provinceWait = 'provinceWait';
        $schoolPass = 'schoolPass';
        $affected = DB::update('
        UPDATE
  work_status
SET
  STATUS = ?
WHERE work_id IN
  (SELECT
    id
  FROM
    WORK
  WHERE user_id IN
    (SELECT
      user_id
    FROM
      applicant
    WHERE school = ?))
  AND STATUS = ?
        ',[$provinceWait,$school,$schoolPass]);
        return redirect('/admin/schoolUp');
    }


    //查询这个学校的申报人信息

    //查询这个学校的申报作品信息
    public function query($workId){
        $data = DB::select('SELECT work.name AS workName,work.big_class,work.small_class,work.aim,work.brief,work.detailed,work.document_address,work.materials_address,work.image_address,work.id AS workId,
applicant.name AS applicantName,applicant.faculty,applicant.card_id,applicant.grade,applicant.school_years,applicant.sex,applicant.major,applicant.address,work_status.status
	FROM (WORK JOIN applicant ON work.user_id = applicant.user_id) JOIN work_status ON work.id = work_status.work_id
WHERE
	(work.id=?)',[$workId]);
        $result = $data[0];
        return view('pages.schoolQuery',compact('result'));
    }
    //查看这个学校的申报人的作品信息

    //设置本校作品的状态
    public function setStatus(Request $request){
        $input = $request->all();
        $workId = $input['workId'];
        $status = $input['status'];
        $affected = DB::update('UPDATE work_status SET STATUS = ? WHERE work_id = ?',[$status,$workId]);
    }

    //查看待审核作品
    public function wait(){
        //获取当前管理员用户的id,进入user-power表获取 所管理的学校。
        $userId = Auth::user()['id'];
        $school = DB::select('SELECT school FROM user_power WHERE (user_id=?)',[$userId])[0]->school;
        //查询到该学校的等待状态的作品
        $results = DB::select(
            'SELECT work.name AS workName,work.big_class,work.id AS workId,applicant.name AS applicantName,applicant.faculty,work_status.status
	          FROM (WORK JOIN applicant ON work.user_id = applicant.user_id) JOIN work_status ON work.id = work_status.work_id
              WHERE
	              (school = ? AND work_status.status=?)',[$school,'schoolWait']
        );

        return view('pages.schoolWait',compact('results'));
    }

    //查看已通过作品
    public function pass(){
        //获取当前管理员用户的id,进入user-power表获取 所管理的学校
        $userId = Auth::user()['id'];
        $school = DB::select('SELECT school FROM user_power WHERE (user_id=?)',[$userId])[0]->school;
        //查询到该学校的等待状态的作品
        $results = DB::select(
            'SELECT work.name AS workName,work.big_class,work.id AS workId,applicant.name AS applicantName,applicant.faculty,work_status.status
	          FROM (WORK JOIN applicant ON work.user_id = applicant.user_id) JOIN work_status ON work.id = work_status.work_id
              WHERE
	              (school = ? AND (work_status.status=? or work_status.status=?))',[$school,'schoolPass','provinceWait']
        );
        return view('pages.schoolPass',compact('results'));
    }

    //查看待修改作品
    public function alter(){
        //获取当前管理员用户的id,进入user-power表获取 所管理的学校
        $userId = Auth::user()['id'];
        $school = DB::select('SELECT school FROM user_power WHERE (user_id=?)',[$userId])[0]->school;
        //查询到该学校的等待状态的作品
        $results = DB::select(
            'SELECT work.name AS workName,work.big_class,work.id AS workId,applicant.name AS applicantName,applicant.faculty,work_status.status
	          FROM (WORK JOIN applicant ON work.user_id = applicant.user_id) JOIN work_status ON work.id = work_status.work_id
              WHERE
	              (school = ? AND work_status.status=?)',[$school,'schoolAlter']
        );
        return view('pages.schoolAlter',compact('results'));
    }

    //查看未通过作品
    public function not(){
        //获取当前管理员用户的id,进入user-power表获取 所管理的学校
        $userId = Auth::user()['id'];
        $school = DB::select('SELECT school FROM user_power WHERE (user_id=?)',[$userId])[0]->school;
        //查询到该学校的等待状态的作品
        $results = DB::select(
            'SELECT work.name AS workName,work.big_class,work.id AS workId,applicant.name AS applicantName,applicant.faculty,work_status.status
	          FROM (WORK JOIN applicant ON work.user_id = applicant.user_id) JOIN work_status ON work.id = work_status.work_id
              WHERE
	              (school = ? AND work_status.status=?)',[$school,'schoolNot']
        );
        return view('pages.schoolNot',compact('results'));
    }
}
