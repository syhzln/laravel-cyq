@extends('model.adminmodel')
@section('amodel_main')
    <form action="{{url('/addimg')}}" method="post" enctype="multipart/form-data" style="margin-bottom: 30px">
        {{csrf_field()}}
        <input type="file" name="img"><br>
        <input type="submit" value="上传" class="btn btn-info" >
    </form>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>图片</th>
            <th>操作</th>
        </tr>
        @if($lunbo->isEmpty())
        <tr>
            <td colspan="3">表中没有数据,请添加!!!</td>
        </tr>
    @endif
        @foreach($lunbo as $img)
            <tr>
                <td style="vertical-align: middle">{{$img->id}}</td>
                <td><img src="{{asset('img/admin/'.$img->img)}}" alt="" style="width:100px;"></td>
                <td style="vertical-align: middle">
                    <a href="{{url('/deleteimg')}}/{{$img->id}}" class="btn btn-info">删除</a>
                    <a href="{{url('/showupdateimg')}}/{{$img->id}}" class="btn btn-info">修改</a>
                </td>
            </tr>
        @endforeach


    </table>
    {{$lunbo->links()}}
    <style>

        table td,th{text-align: center;}
    </style>
@endsection