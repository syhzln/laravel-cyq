@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/album')}}">相册管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/photo/add/'.$aid)}}"><span class="glyphicon glyphicon-plus"></span>新增图片</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:100%;text-align:center;margin:0 auto;!important;">
            <ul style="list-style: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if($arr != [])
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>图片</th>
            <th>创建时间</th>
            <th>图片名</th>
            <th>路径</th>
            <th>操作</th>
        </tr>
        @foreach($arr as $a)
            <tr>
                <td>{{$a['id']}}</td>
                <td><img src="{{asset($a['savepath'].'/'.$a['pho_name'])}}" width="50" ></td>
                <td>{{date('Y-m-d H:i:s',$a['time'])}}</td>
                <td>{{$a['pho_name']}}</td>
                <td>{{$a['savepath']}}</td>
                <td>
                    <a href="{{url('/admin/photo/del/'.$a['id'])}}" class="btn btn-success">删除</a>
                    <a href="{{url('/admin/photo/look/'.$a['id'])}}" class="btn btn-success">查看</a>
                </td>
                @endforeach
            </tr>
    </table>
    {{$arr->links()}}
    @endif
    <style>
        table td,th{text-align: center;}
    </style>
@endsection