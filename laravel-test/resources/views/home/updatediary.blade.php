@extends('model.homemodel')
@section('mycss')
    <link href="{{asset('home/css/writediary.css')}}" rel="stylesheet">
@endsection
@section('fresh')
@endsection
@section('second')
    <a href="{{url('home/diary')}}"><li>我的日志</li></a>
@endsection
@section('main')
    @if($arr!=[])
        <div id="write">
            <form action="{{url('home/doupdiary')}}" method="post" enctype="multipart/form-data" id="write_from" multiple>
                <div id="addblog-left" class="addblog-box">
                    <div id="addBlog_editorWrap">
                        <div id="addBlog_blogTitle_box">
                            <textarea placeholder="输入日志标题" name="title" id="addBlog_blogTitle" minheight="30" maxheight="1000">{{$arr['title']}}</textarea>
                        </div>
                        <div class="mceLayout">

                            <!--- 能填入 -->
                            <div id="word">
                                {{-- 能填入图片的 --}}
                                <textarea id="myDiv" name="content" style="resize:none">{{$arr['content']}}</textarea>
                            </div>
                        </div>
                    </div>
                    {{-- 显示图片 --}}
                    @if( $arr['photoname']!=0 )
                        <div style="width:100%;height: auto;" class='asdasd'>
                            @for( $i=1;$i<=$arr['photoname'];$i++)
                                @if(file_exists('img/'.$arr['uid'].'_'.$arr['utime'].'/'.$i.'.jpg'))
                                <img width="217" height="100" src="{{asset('img/'.$arr['uid'].'_'.$arr['utime'].'/'.$i.'.jpg')}}" style="margin: 0 0 10px 15px;">
                                @endif
                            @endfor
                        </div>
                    @endif
                    <div id="addBlog_editorButtons">
                        <a  href="{{url('/home/diary')}}" type="button" id="cancel" class="btn btn-default" value="">取消</a>
                        <select name="cstate" style="height:33px;">
                            <option value="1" {{$arr['cstate']==1?'selected':""}}>公开</option>
                            <option value="2" {{$arr['cstate']==2?'selected':""}}>不公开</option>
                        </select>
                        <input type="hidden" name="id" value="{{$arr['id']}}">
                        {{csrf_field()}}
                        <input type="submit" id="push" class="btn btn-info" value="更新日志" tabindex="4">
                    </div>
                </div>
                <div id="addblog-right" >
                    <div class="btn-group">
                        @if(count($errors))
                            <ul class="alert alert-danger" style="width:100px;height:100px;!important;">

                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>

                    @endif
                </div>
        </div>
        </form>
        </div>
    @endif
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script  >

        $(function(){

            $(window).resize(function(){
                if($('body').css('margin-left') != 150 ){
                    $('.model_main').css({
                        'margin-left':'150px',
                    });
                    $('body').css({
                        'margin-left':'0',
                    });
                }
                if($('body').css('margin-left') == 150 ){
                    $('.model_main').css({
                        'padding-left':'0',
                    });
                    $('body').css({
                        'margin-left':'150px',
                    });
                }
            })
        });
    </script>
@endsection