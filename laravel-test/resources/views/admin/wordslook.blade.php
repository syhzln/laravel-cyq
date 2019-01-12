@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/words')}}">留言管理</a> &nbsp; </span>
    </div>

    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-pencil"></span>查看留言</h3>

            <div class="form-group">
                <label for="exampleInputEmail1">留言ID</label>
                <input type="text" class="form-control"  value="{{$arr['id']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">用户1ID</label>
                <input type="text" class="form-control" value="{{$arr['user1id']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">用户2ID</label>
                <input type="text" class="form-control" value="{{$arr['user2id']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">留言内容</label>
                {{--<input type="text" class="form-control" value="{{$arr['content']}}" disabled>--}}
                <textarea name="" class="form-control" id="" cols="30" rows="10" disabled style="resize: none">{{$arr['content']}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">时间</label>
                <input type="text" class="form-control" value="{{date('Y-m-d H:i:s',$arr['time'])}}" disabled>
            </div>

            <a href="{{url('admin/words')}}" class="btn btn-info">返回留言管理</a>


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