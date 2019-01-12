@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('admin/advert')}}">广告管理</a> &nbsp; </span>
    </div>
    <div class="amodel_mainsecond">
        <span> <a href="{{url('admin/advert/add')}}"><span class="glyphicon glyphicon-plus"></span>新增广告</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">

            <h3><span class="glyphicon glyphicon-film"></span>添加新广告</h3>
            <form action="{{url('/admin/advert/doadd')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">公司名</label>
                    <input type="text" class="form-control" name="company">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">公司英文名</label>
                    <input type="text" class="form-control" name="englishcompany">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">链接</label>
                    <input type="text" class="form-control" name="link">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">题目</label>
                    <input type="text" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">状态</label>
                    <select class="form-control" name="status">
                        <option value="1">大广告</option>
                        <option value="2">小广告</option>
                    </select>
                </div>
                <input type="file" name="pic" style="margin-left:26%;" >
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