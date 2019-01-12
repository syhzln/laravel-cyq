@extends('model.adminmodel')
@section('amodel_main')

    <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

        <h3><span class="glyphicon glyphicon-picture"></span>添加游戏</h3>
        <form action="{{url('/doupdategame/'.$id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">游戏名</label>
                <input type="text" name="name" value="{{$game->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">路&nbsp&nbsp&nbsp&nbsp径</label>
                <input type="text" name="path" value="{{$game->path}}">
            </div>
            <div class="form-group" style="margin-left: 90px">
                <input type="file" name="img">
            </div>
            <input type="submit" class="btn btn-default" value="修改">
            <a href="{{url('admin/game')}}"  class="btn btn-default">返回</a>
        </form>
    </div>
    @if(count($errors) > 0)
        <div class="alert alert-danger" style="width:400px;margin:0 auto;!important;">
            <ul style="list-style: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        </div>

@endsection