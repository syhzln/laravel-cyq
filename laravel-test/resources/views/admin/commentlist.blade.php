@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/comment-list')}}">评论管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span><a href="{{url('admin/comment-add')}}"><span class="glyphicon glyphicon-plus"></span>新增评论</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>Id</th>
            <th>用户ID</th>
            <th>日志ID</th>
            <th>日志用户ID</th>
            <th>品论内容</th>
            <th>评论时间</th>
            <th>操作</th>
        </tr>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment['id_c']}}</td>
                <td>{{$comment['uid']}}</td>
                <td>{{$comment['tid']}}</td>
                <td>{{$comment['tuid']}}</td>
                <td>{{$comment['content_c']}}</td>
                <td>{{$comment['utime_c']}}</td>
                <td>
                    <a href="{{url('admin/comment-update/'.$comment["id_c"])}}" class="btn btn-success">修改</a>
                    <a href="{{url('admin/comment-delete/'.$comment["id_c"])}}" class="btn btn-success">删除</a>
                </td>
                @endforeach
            </tr>
    </table>
    {{$commentts->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection