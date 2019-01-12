@extends('model.homemodel')

@section('title')
    我的相册
@endsection

@section('mycss')
    <link href="{{asset('home/css/photo.css')}}" rel="stylesheet">
@endsection


@section('main')
    @if(count($errors))
        <div>
        <ul class="alert alert-danger" style="width:860px;padding:10px 0;height:40px;margin:20px auto 10px;!important;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
            @endif
            <div id="photo_second">
                <div id="photo_ulf" >
                    <ul id="photo_ul">
                        <a href="{{url('home/photo')}}"><li>我的相册</li></a>
                    </ul>
                    <div class="photo_inright">
                        <form action="{{url('/home/upphoto')}}"  method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <a class="btn btn-danger" id="newp"  style="padding-top:4px;padding-bottom:4px;"><span class="glyphicon glyphicon-plus"></span>新建相册</a>
                            <span style="font-size: 22px;">|</span>
                            <a href="" class="file btn btn-info"><span class="glyphicon glyphicon-open"></span>选择照片
                                <input type="file" name="pic[]" id="photo" multiple>
                            </a>
                            <select value="选择相册" name="myphoto" style="height:30px;border-radius: 5px;outline: none">
                                @if($arr !=[])
                                    @foreach($arr as $ar)
                                        <option value="{{$ar['id']}}">{{$ar['pname']}}</option>
                                    @endforeach
                                @endif

                            </select>
                            <input type="submit" class="btn btn-success" value="点击上传" style="padding-top:4px;padding-bottom:4px;">
                        </form>

                    </div>
                </div>    <!-- 这是我的相册第一行 -->
                <div class="photo_photos">
                    @if($arr !=[])
                        @foreach($arr as $ar)
                            <div class="photo_photo">
                                <div class="photo_img">
                                    <a href="{{url('/home/photos/'.$ar['id'])}}"><img src="{{ asset($ar['savepath'].'/'.$ar['pho_name'])  }}" width="230" height="160"></a>
                                    {{--                            <a href=""><img src="{{asset('home/img/4.jpg')}}" width="230" height="160"></a>--}}
                                </div>
                                <div class="photo_from">
                                    <a href="{{url('/home/photos/'.$ar['id'])}}">{{$ar['pname']}}</a>
                                    <a href="{{url('/home/delpho/'.$ar['id'])}}" style="text-align: center;">删除</a>
                                    <span>{{$ar['status']==1?'公开':'不公开'}}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif



                </div>


            </div>
            <div class="mybody">
            </div>
            <div class="diary_brow" >
                <div class="diary_brow1">
                    <span class="diary_brow1span"><b>新建相册</b></span>
                    <span class="glyphicon glyphicon-remove" id="docuo" style="float:right;margin-right:15px;line-height:30px;"></span>
                </div>

                <div class="diary_brow2">
                    <form action="/home/doalbum" method="post">
                        {{csrf_field()}}
                        相册名:<input type="text" name="pname" id="album_namea"><br>
                        状&nbsp;&nbsp;&nbsp;&nbsp;态:
                        <select name="status" id="album_name">
                            <option value="1">公开</option>
                            <option value="2">不公开</option>
                        </select><br>
                        <input type="hidden" name="uid" id="uid" value="{{Auth::user()->id}}">
                        <input type="submit" id="doalbum" class="btn btn-info" value="添加">
                    </form>
                </div>
            </div>
            @endsection
            @section('my_js')
                <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
                <script>
                    $(function(){
                        $('#newp').click(function(){
                            $('.mybody').css({
                                'display':'block'
                            });
                            $('.diary_brow').css({
                                'display':'block'
                            });
                        });
                        $('#docuo').click(function(){
                            $('.mybody').css({
                                'display':'none'
                            });
                            $('.diary_brow').css({
                                'display':'none'
                            });
                        });
                    })
                </script>
@endsection



























