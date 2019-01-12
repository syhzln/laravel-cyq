@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/praise-list')}}">点赞管理</a> &nbsp; </span>
    </div>


    @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:100%;height:50px;padding:0;line-height:30px;text-align:center;margin:0 auto;!important;">
            <ul style="list-style: none;height:20px;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>评论ID</th>
            <th>点赞统计</th>
            <th>操作</th>
        </tr>
        @foreach($links as $zan)
            <tr>
                <td>{{$zan->rid}}</td>
                <td>{{$zan->zan}}</td>
                <td>
                    <a href="{{url('admin/praise-show/'.$zan->rid)}}" class="btn btn-info">查看</a>
                </td>
                @endforeach
            </tr>
    </table>

    <style>
        table td,th{text-align: center;}
    </style>
@endsection