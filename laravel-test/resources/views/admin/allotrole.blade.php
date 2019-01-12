@extends('model.adminmodel')
@section('amodel_main')
    <div class="amodel_mainfirst">
        <span> <span class="glyphicon glyphicon-home"></span><a href="{{url('admin/index')}}">首页</a> &nbsp;>>&nbsp; <a href="{{url('/admin/user-list')}}">管理员管理</a> &nbsp; </span>
    </div>

    <div style="width:100%;height:100%;">
        <div style="width:400px;margin:20px auto 10px;border-radius: 3px;padding:15px;box-shadow: 1px 1px 3px 1px #dedede;text-align:center">
            <h3><span class="glyphicon glyphicon-picture"></span>分配角色</h3>
            <form id="edit-profile" class="form-horizontal" action="{{url('admin/attach-role').'/'.$user_id}}" method="post">
               {{csrf_field()}}
                <div class="form-group">
                    <td>
                        @foreach($roles as $role)
                            <div class="checkbox">
                                <label><input type="checkbox" name="role_id[]" value="{{$role->id}}">{{$role->display_name}}</label>
                            </div>
                        @endforeach
                    </td>
                </div>
                <input type="submit" class="btn btn-success" value="提交" style="width: 100px">
                <a  type="button" class="btn btn-info" onclick="history.go(-1)">返回</a>

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