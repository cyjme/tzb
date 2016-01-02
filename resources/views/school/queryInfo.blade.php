@extends('layouts.adminSchool')
@section('content')
    <div class="row" style="padding-top: 20px;">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{$data->title}}
            </div>
            <div class="panel-body">
                {{$data->content}}
            </div>
        </div>
    </div>
@endsection