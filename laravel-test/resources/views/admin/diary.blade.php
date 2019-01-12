@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/diary')}}">日志管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/diary/add')}}"><span class="glyphicon glyphicon-plus"></span>新增日志</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>用户ID</th>
            <th>标题</th>
            <th>内容</th>
            <th>创建时间</th>
            <th>图片数</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @if($arr != [])
            @foreach($arr as $a)
                <tr>
                    <td>{{$a['id']}}</td>
                    <td>{{$a['uid']}}</td>
                    <td>{{$a['title']}}</td>
                    <td>{{(strlen($a['content'])<50)?($a['content']):(substr($a['content'],0,48)."...")}}</td>
{{--                    <td>{{count(substr($a['content'],0,56))}}</td>--}}
                    <td>{{date('Y-m-d H:i:s',$a['utime'])}}</td>
                    <td>{{$a['photoname']}}</td>
                    <td>{{$a['cstate']==1?'公开':'不公开'}}</td>
                    <td>
                        <a href="{{url('/admin/diary/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                        <a href="{{url('/admin/diary/up/'.$a['id'])}}" class="btn btn-success">修改</a>
                        <a href="{{url('/admin/diary/look/'.$a['id'])}}" class="btn btn-success">查看</a>
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