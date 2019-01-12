@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/birth-list')}}">生日管理</a> &nbsp;>>&nbsp; <a href="{{url('/admin/birth-show')}}">最近生日</a> </span>
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
            <th>用户ID</th>
            <th>头像</th>
            <th>用户名称</th>
            <th>生日</th>
            <th>礼物情况</th>
        </tr>
        @forelse($ufriendBirth as $firendbirth)
            <tr>
                <td>{{$firendbirth->id}}</td>
                <td>
                    @if($firendbirth->avatar != 'home/img/default.jpg')
                        <img src="{{asset('img/home/'.$firendbirth->avatar)}}" style="width: 68px;height: 68px;">
                    @else
                        <img src="{{asset($firendbirth->avatar)}}" style="width: 68px;height: 68px;">
                    @endif
                </td>
                <td>{{$firendbirth->name}}</td>
                <td>{{$firendbirth->birthday}}</td>
                <td><a href="{{url('admin/gift-show/'.$firendbirth->id)}}" class="btn btn-info">查看</a></td>
                @empty
            <tr>
                <td colspan="5">暂无一周内过生日的用户</td>
            </tr>
                @endforelse
            </tr>
    </table>
    {{--{{$userbirthdays->links()}}--}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection