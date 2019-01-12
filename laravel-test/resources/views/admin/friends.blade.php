@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/friends')}}">好友管理</a> &nbsp; </span>
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
            <th>关系ID</th>
            <th>用户1ID</th>
            <th>用户1姓名</th>
            <th>用户2ID</th>
            <th>用户2姓名</th>
            <th>关系</th>
            <th>操作</th>
        </tr>
        @if($arr != [])
        @foreach($arr as $a)
            <tr>
                <td>{{$a['id']}}</td>
                <td>{{$a['user1id']}}</td>
                <td>{{$a['u1name']}}</td>
                <td>{{$a['user2id']}}</td>
                <td>{{$a['u2name']}}</td>
                <td>{{$a['status']==1?'用户1关注用户2':'好友'}}</td>
                <td>
                    <a href="{{url('/admin/friends/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                    <a href="{{url('/admin/friends/up/'.$a['id'])}}" class="btn btn-success">修改</a>
                    <a href="{{url('/admin/friends/look/'.$a['id'])}}" class="btn btn-success">查看</a>
                </td>
                @endforeach
            </tr>
            {{$arr->links()}}
         @endif
    </table>

    <style>
        table td,th{text-align: center;}
    </style>
@endsection