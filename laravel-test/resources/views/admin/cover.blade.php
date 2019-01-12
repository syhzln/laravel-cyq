@extends('model.adminmodel')
@section('amodel_main')

    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>uid</th>
            <th>img</th>
            <th>handle</th>
        </tr>
        @if(empty($cover))
            <tr>
                <td colspan="4">表中没有数据,请添加!!!</td>
            </tr>
        @endif
        @foreach($cover as $covers)

            <tr>
                <td style="vertical-align: middle">{{$covers->id}}</td>
                <td style="vertical-align: middle">{{$covers->uid}}</td>
                <td style="vertical-align: middle"><img src="{{asset('img/home/'.$covers->img)}}" alt="" style="width:100px;"></td>
                <td style="vertical-align: middle">
                    <a href="{{url('/deletecover')}}/{{$covers->uid}}" class="btn btn-success">删除</a>
                </td>

            </tr>
        @endforeach
    </table>
    {{$cover->links()}}
    <style>
        table td,th{text-align: center;}
    </style>
@endsection