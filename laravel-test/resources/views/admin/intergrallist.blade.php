@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/intergral-list')}}">积分管理</a> &nbsp; </span>
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
            <th>人品总值</th>
            <th>今天人品值</th>
            <th>刷新人品值</th>
            <th>上次登录时间</th>
            <th>刷新人品值</th>
            <th>操作</th>
        </tr>
        @foreach($integrades as $grades)
            <tr>
                <td>{{$grades->id_e}}</td>
                <td>{{$grades->uid}}</td>
                <td>{{$grades->rp_z}}</td>
                <td>{{$grades->rp_d}}</td>
                <td>{{$grades->rp_f}}</td>
                <td>{{$grades->time_d}}</td>
                <td>{{$grades->time_m}}</td>
                <td>
                    <a href="{{url('admin/intergral-update/'.$grades->id_e)}}" class="btn btn-success">修改</a>
                    <a href="{{url('admin/intergral-delete/'.$grades->id_e)}}" class="btn btn-success">删除</a>
                </td>
                @endforeach
            </tr>
    </table>
    {{$integrade->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection