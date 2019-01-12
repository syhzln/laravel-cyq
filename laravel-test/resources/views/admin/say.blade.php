@extends('model.adminmodel')
@section('amodel_main')

    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/say')}}">说说管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('/addsay')}}"><span class="glyphicon glyphicon-plus"></span>新增说说</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>uid</th>
            <th>内容</th>
            <th>更新时间</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @if(empty($say))
            <tr>
                <td colspan="6">表中没有数据,请添加!!!</td>
            </tr>
        @endif
        @foreach($say as $says)

            <tr>
                <td>{{$says['id']}}</td>
                <td>{{$says['uid']}}</td>
                <td>{{$says['content']}}</td>
                <td>{{$says['updated_at']}}</td>
                <td>{{$says['created_at']}}</td>
                <td>
                    <a href="{{url('/deletesay')}}/{{$says['id']}}" class="btn btn-success">删除</a>
                    <a href="{{url('/updatesay')}}/{{$says['id']}}" class="btn btn-success">修改</a>
                </td>

            </tr>
        @endforeach
    </table>
    <style>
        table td,th{text-align: center;}
    </style>
@endsection