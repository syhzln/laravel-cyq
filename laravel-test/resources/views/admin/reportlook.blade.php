@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/report')}}">举报管理</a> &nbsp; </span>
    </div>
  
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

            <h3><span class="glyphicon glyphicon-eye-open"></span>查看举报信息</h3>
            <div class="form-group">
                <label for="exampleInputEmail1">ID</label>
                <input type="text" class="form-control" name="title" value="{{$arr['id']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">用户1</label>
                <input type="text" class="form-control" name="u1name" value="{{$arr['u1name']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">用户1手机号</label>
                <input type="text" class="form-control" name="u1phone" value="{{$arr['u1phone']}}" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">被举报的用户2</label>
                <input type="text" class="form-control" name="u2info" value="{{$arr['u2info']}}" disabled>
            </div>
            <a href="{{url('admin/report')}}" class="btn btn-info">返回举报管理</a>
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