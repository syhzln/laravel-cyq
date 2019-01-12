@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/role-list')}}">角色管理</a> &nbsp; </span>
    </div>

    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>添加角色</h3>
            <form action="" method="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">角色名称</label>
                    <input type="text" class="form-control" placeholder="" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">角色描述</label>
                    <input type="text" class="form-control" placeholder="" name="display_name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">描述</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>

                {{csrf_field()}}
                <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
                <a href="{{url('admin/role-list')}}" class="btn btn-primary">返回</a>
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