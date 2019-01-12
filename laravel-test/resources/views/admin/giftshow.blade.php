@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/birth-list')}}">生日管理</a> &nbsp;>>&nbsp; <a href="">礼物管理</a> </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/gift-add/'.$birth_id)}}"><span class="glyphicon glyphicon-plus"></span>新增祝福</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <th>好友ID</th>
            <th>生日祝语</th>
            <th>收到的回复</th>
            <th>操作</th>
        </tr>
        <tr>
            <td colspan="6"><h4><b>共送出<span style="color:red;">{{count($gifts)}}</span>条祝福</b></h4></td>
        </tr>
        @forelse($gifts as $gift)
            <tr>
                <td>{{$gift->id}}</td>
                <td>{{$gift->uid}}</td>
                <td>{{$gift->gid}}</td>
                <td>{{$gift->gift}}</td>
                <td>{{$gift->getGift}}</td>
                <td><a href="{{url('/admin/gift-delete/'.$gift->id)}}" class="btn btn-success">删除</a></td>
                @empty
            <tr>
                <td colspan="6">暂无送出好友生日祝福</td>
            </tr>
                @endforelse
            </tr>
            <tr>
                <td colspan="6"><h4><b>共收到<span style="color:red;">{{count($getgifts)}}</span>条祝福</b></h4></td>
            </tr>
            @forelse($getgifts as $getgift)
                <tr>
                    <td>{{$getgift->id}}</td>
                    <td>{{$getgift->uid}}</td>
                    <td>{{$getgift->gid}}</td>
                    <td>{{$getgift->gift}}</td>
                    <td>{{$getgift->getGift}}</td>
                    <td><a href="{{url('/admin/gift-delete/'.$getgift->id)}}" class="btn btn-success">删除</a></td>
            @empty
                <tr>
                    <td colspan="6">暂无收到好友生日祝福</td>
                </tr>
                @endforelse
                </tr>
    </table>
    {{$giftlink->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection