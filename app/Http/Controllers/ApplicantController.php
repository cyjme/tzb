<?php
//��������ApplicantController.php
//���ܣ��걨����Ϣ��д���޸ĵȡ�
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

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //�걨����Ϣ��д
        return view('form.applicant',compact('userId'));
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
        $input['user_id'] = Auth::user()['id'];
        Applicant::create($input);
        return redirect('/partner/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPartner(){
        return view('form.addPartner');
    }
    public function partnerStore(Request $request){
        $input = $request->all();
        $input['user_id'] = Auth::user()['id'];
        Partner::create($input);
        return redirect('/work/create/1');
    }

}
