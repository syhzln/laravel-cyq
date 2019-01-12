@extends('model.adminmodel')
@section('amodel_main')

    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/game')}}">游戏管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('/addgame')}}"><span class="glyphicon glyphicon-plus"></span>新增游戏</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>img</th>
            <th>name</th>
            <th>path</th>
            <th>handle</th>
        </tr>
        @if(empty($game))
            <tr>
                <td colspan="5">表中没有数据,请添加!!!</td>
            </tr>
        @endif
        @foreach($game as $games)

            <tr>
                <td style="vertical-align: middle">{{$games->id}}</td>
                <td style="vertical-align: middle"><img src="{{asset('img/admin/'.$games->img)}}" alt="" style="width:100px;"></td>
                <td style="vertical-align: middle">{{$games->name}}</td>
                <td style="vertical-align: middle">{{$games->path}}</td>
                <td style="vertical-align: middle">
                    <a href="{{url('/deletegame')}}/{{$games->id}}" class="btn btn-success">删除</a>
                    <a href="{{url('/updategame')}}/{{$games->id}}" class="btn btn-success">修改</a>
                </td>

            </tr>
        @endforeach
    </table>
    {{$game->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection