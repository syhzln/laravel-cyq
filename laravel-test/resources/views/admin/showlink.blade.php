@extends('model.adminmodel')
@section('amodel_main')
<link href="{{asset('home/css/information.css')}}" rel="stylesheet">
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>链接</th>
            <th>操作</th>
        </tr>
        @if($links->isEmpty())
            <tr>
                <td colspan="4">表中没有数据,请添加!!!</td>
            </tr>
        @endif
        @foreach($links as $link)
            <tr>
                <td style="vertical-align: middle">{{$link->id}}</td>
                <td style="vertical-align: middle">{{$link->name}}</td>
                <td style="vertical-align: middle">{{$link->link}}</td>
                <td style="vertical-align: middle">
                    <a href="{{url('/showaddlink')}}" class="btn btn-info">添加</a>
                    <a href="{{url('/deletelink')}}/{{$link->id}}" class="btn btn-info">删除</a>
                    <a href="{{url('/showupdatelink')}}/{{$link->id}}" class="btn btn-info">修改</a>

                </td>
            </tr>
        @endforeach


    </table>
    {{$links->links()}}
    <style>

        table td,th{text-align: center;}
    </style>
@endsection