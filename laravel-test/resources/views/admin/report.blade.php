@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-film"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/report')}}">举报管理</a> &nbsp; </span>
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
            <th>ID</th>
            <th>用户1</th>
            <th>用户1的手机号</th>
            <th>被举报的用户2</th>
            <th>举报的信息</th>
            <th>操作</th>
        </tr>
        @if($arr !=[])
            @foreach($as as $a)
                <tr>
                    <td>{{$a['id']}}</td>
                    <td>{{$a['u1name']}}</td>
                    <td>{{$a['u1phone']}}</td>
                    <td>{{$a['u2name']}}</td>
                    <td>{{$a['u2info']}}</td>
                    <td>
                        <a href="{{url('/admin/report/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                        <a href="{{url('/admin/report/look/'.$a['id'])}}" class="btn btn-success">查看</a>
                    </td>
                    @endforeach
                </tr>
                {{$as->links()}}
                @endif
    </table>

    <style>
        table td,th{text-align: center;}
    </style>
@endsection