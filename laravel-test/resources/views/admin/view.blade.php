@extends('model.adminmodel')
@section('amodel_main')

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>uid</th>
            <th>内容</th>
            <th>更新时间</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @if(empty($views))
            <tr>
                <td colspan="6">表中没有数据,请添加!!!</td>
            </tr>
        @endif
        @foreach($views as $view)

            <tr>
                <td>{{$view->id}}</td>
                <td>{{$view->uid}}</td>
                <td>{{$view->content}}</td>
                <td>{{$view->updated_at}}</td>
                <td>{{$view->created_at}}</td>
                <td>
                    <a href="{{url('/deleteview/')}}/{{$view->id}}" class="btn btn-success">删除</a>
                </td>

            </tr>
        @endforeach
    </table>
    {{$views->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
    @endsection