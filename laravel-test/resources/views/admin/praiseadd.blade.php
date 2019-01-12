@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/praise-list')}}">点赞管理</a> &nbsp; </span>
    </div>

    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>添加点赞</h3>
            <form action="" method="post" >
                <div class="form-group">
                <label for="exampleInputEmail1">用户ID</label>
                <input type="text" name="uid" class="form-control" placeholder="" value="1">
               </div>
        <div class="form-group">
            <label for="exampleInputPassword1">评论ID</label>
            <input type="text" name="rid" class="form-control" placeholder="" value="{{$praise_id}}" readonly>
        </div>

        {{csrf_field()}}
        <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
        <a  type="button"  onclick="history.go(-1)" class="btn btn-primary">返回</a>
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