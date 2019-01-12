@extends('model.adminmodel')
@section('amodel_main')
    <div style="width: 1247px;height: 611px">
        <div class="info-section">
            <div class="details-infoedit">
                <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/basic.png')}}">
                            </span>
                    <span>添加用户</span>
                </h4>
                    <form action="/add" method="post">
                        {{csrf_field()}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" style="width:210px;!important;list-style: none">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                       用户名: <input type="text" name="name" class="input-class" ><br><br>
                        性 别: <input type="radio" name="sex" value="1" checked >男
                               <input type="radio" name="sex" value="2" >女
                        <br><br>
                        邮 箱: <input type="email" name="email" class="input-class"><br><br>
                        密码:<input type="password" name="password" id="password" class="input-class" placeholder="密码由6-20个字符组成"><br><br>
                        重复密码:<input type="password" name="password_confirmation" id="password_confirmation" maxlength="20"class="input-class"><br><br>
                        <input type="submit" value="保存" class="btn btn-default">
                        <a href="{{url('admin/index')}}" class="btn btn-default">退出</a>
                    </form>

            </div>
        </div>
    </div>

@endsection