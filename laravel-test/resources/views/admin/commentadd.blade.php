@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/comment-list')}}">评论管理</a> &nbsp; </span>
    </div>

    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>添加评论</h3>
            <form action="" method="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">用户ID</label>
                    <input type="text" name="uid" class="form-control" placeholder="" value="{{session('a')}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">日   志</label>
                    <select class="form-control" name="tid">
                        @forelse($tid as $key => $value)
                            <option value="{{$value}}">{{$value}}</option>
                        @empty
                            <option >当前无日志</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">评论 内容</label>
                    <input type="text" name="content_c" class="form-control" placeholder="">
                </div>
                {{csrf_field()}}
                <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
                <a href="{{url('/admin/comment-list')}}" class="btn btn-primary">返回</a>
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