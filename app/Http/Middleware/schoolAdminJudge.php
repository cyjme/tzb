<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class schoolAdminJudge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //��ȡ��ǰ��¼�û�id���жϵ�ǰ�û�����ݣ��Ƿ�Ϊ����Ա
        $userId = Auth::user()['id'];
        $power = DB::select('select is_admin from user_power where(user_id = ?)',[$userId]);
        if(count($power)>0)
        {
            if($power[0]->is_admin=='school')
            {
                return $next($request);
            }
        }
        else
            return redirect('/');
    }
}
