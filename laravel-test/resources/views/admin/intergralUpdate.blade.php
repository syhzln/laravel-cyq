@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/intergral-list')}}">积分管理</a> &nbsp; </span>
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>添加评论</h3>
            <form action="" method="post" >
                <div class="form-group">
                    <label for="exampleInputEmail1">用户ID</label>
                    <input type="text" name="uid" class="form-control" placeholder="" value="{{$integrades->uid}}" readonly>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">总 积分</label>
                    <input type="text" name="rp_z" class="form-control" placeholder="" value="{{$integrades->rp_z}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">今   日     积    分</label>
                    <input type="text" name="rp_d" class="form-control" placeholder="" value="{{$integrades->rp_d}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">刷  新  获  得  积  分</label>
                    <input type="text" name="rp_f" class="form-control" placeholder="" value="{{$integrades->rp_f}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">上 次   登 录   时 间（年/月/日）</label>
                    <input type="datetime" name="time_d" class="form-control" placeholder="" value="{{$integrades->time_d}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">半 小 时 刷 新 时 间（分/秒/毫秒）</label>
                    <input type="datetime" name="time_m" class="form-control" placeholder="" value="{{$integrades->time_m}}">
                </div>
                {{csrf_field()}}
                <input type="submit" class="btn btn-success" value="提交" style="width: 100px;">
                <a href="{{url('/admin/intergral-list')}}" class="btn btn-primary">返回</a>
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