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
            <h3><span class="glyphicon glyphicon-film"></span>查看广告</h3>

                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">公司名</label>
                    <input type="text" class="form-control" name="company" value="{{$arr['company']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">公司英文名</label>
                    <input type="text" class="form-control" name="englishcompany" value="{{$arr['englishcompany']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">链接</label>
                    <input type="text" class="form-control" name="link" value="{{$arr['link']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">题目</label>
                    <input type="text" class="form-control" name="title" value="{{$arr['title']}}" disabled>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">状态</label>
                    <select class="form-control" name="status" disabled>
                        <option value="1" {{$arr['status']==1?'selected':''}}>大广告</option>
                        <option value="2" {{$arr['status']==1?'':'selected'}}>小广告</option>
                    </select>
                </div>
                <a href="{{url('admin/advert')}}" class="btn btn-info">返回广告管理</a>


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