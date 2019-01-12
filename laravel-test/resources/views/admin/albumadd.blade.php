@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/album')}}">相册管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/album/add')}}"><span class="glyphicon glyphicon-plus"></span>新增相册</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
   <div style="width:100%;height:100%;">
       <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

           <h3><span class="glyphicon glyphicon-picture"></span>添加相册</h3>
           <form action="{{url('/admin/doalbumadd')}}" method="post" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="exampleInputEmail1">用户ID</label>
                   <input type="text" class="form-control" name="uid">
               </div>
               <div class="form-group">
                   <label for="exampleInputPassword1">相册名</label>
                   <input type="text" class="form-control" name="pname">
               </div>
               <div class="form-group">
                   <label for="exampleInputPassword1">状态</label>
                   <select class="form-control" name="status">
                       <option value="1">开放</option>
                       <option value="2">不开放</option>
                   </select>
               </div>
               {{csrf_field()}}
               <input type="submit" class="btn btn-default" value="新建">
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