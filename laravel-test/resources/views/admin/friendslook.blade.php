@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/friends')}}">好友管理</a> &nbsp; </span>
    </div>
    
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>添加关系</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">用户1ID</label>
                    <input type="text" class="form-control" name="user1id" value="{{$arr['user1id']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">用户1姓名</label>
                    <input type="text" class="form-control" name="user1id" value="{{$arr['u1name']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">用户2ID</label>
                    <input type="text" class="form-control" name="user1id" value="{{$arr['user2id']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">用户1姓名</label>
                    <input type="text" class="form-control" name="user1id" value="{{$arr['u2name']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">关系</label>
                    <select class="form-control" name="status" disabled>
                        <option value="1" {{$arr['status']==1?'selected':''}}>用户1关注用户2</option>
                        <option value="3" {{$arr['status']==1?'':'selected'}}>好友</option>
                    </select>
                </div>
                <a href="{{url('/admin/friends')}}" class="btn btn-info">返回好友管理</a>
                {{--<input type="submit" class="btn btn-default" value="修改">--}}
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