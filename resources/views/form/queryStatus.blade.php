@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    您当前的作品状态为：
                </div>
                <div class="panel-body">
                    @if($status== 'schoolPass')
                        学校审核通过
                        @elseif($status=='schoolWait')
                            等待学校审核
                            @elseif($status=='schoolAlter')
                                您的作品需要重新修改提交
                                @elseif($status == 'schoolNot')
                                    您的作品没有审核通过
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endsection