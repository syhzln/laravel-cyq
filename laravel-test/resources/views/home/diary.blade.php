@extends('model.homemodel')
@section('mycss')
    <link href="{{asset('home/css/diary.css')}}" rel="stylesheet">
@endsection

@section('main')
    <div class="diary_main" style="width:597px;height:auto;margin: 0 auto">
        <div class="ugc-list-left">
            <div class="ugc-left-header">
                <div id="blogList_tabBox" class="ugc-header-left">
                    <a href="#nogo" id="blogList_myblogTab"  class="ugc-header-a headhover"><span class="ugc-header-span"><b>我的日志</b></span></a>
                </div>

                <div class="ugc-header-right">
                    <a href="{{url('home/writediary')}}" class="btn btn-default" style="padding: 4px 12px"><img src="{{asset('home/img/addBlog.png')}}" ></a>
                    <div class="btn btn-default" style="padding: 4px 12px" id="more" title="批量管理">
                        <img src="{{asset('home/img/more.png')}}">
                    </div>
                </div>

            </div>

            <div class="out_kuang">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" style="width:100%;!important;">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(count($arr))
                    @foreach($arr as $ar)
                        {{-- 当前一段日志的框 --}}
                        <div class="middle_kuang">
                            {{--日志中间的框--}}
                            <div class="in_kuang">
                                {{-- 标题 --}}
                                <div class="in_kuang1"><a href="{{url('/home/updatediary/'.$ar['id'])}}">{{$ar['title']}}</a></div>
                                <div class="in_kuang2">{{date('Y-m-d H:i:s',$ar['utime'])}}  {{$ar['cstate']==1?'公开':'不公开'}}</div>
                                <div class="in_kuang3">{{$ar['content']}}</div>
                                <div class="in_kuang4">
                                    <a href="{{url('/home/updatediary/'.$ar['id'])}}"> 编辑 </a> |
                                    <a href="{{url('/home/deldiary/'.$ar['id'])}}">删除</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div style="height:20px;"></div>
            </div>
        </div>
    </div>
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>
        $(function(){
//        $('.in_kuang3').html($(this).html().replace(/\[\[/ig, '<img src=http://hui.dev/home/img/'));
//        $('.in_kuang3').html($(this).html().replace(/\]\]/ig, '.gif >'));
            $('.middle_kuang').mousemove(function(){
                $(this).css({
                    'background-color':'#F3F6F8',
                });

            });

            $('.middle_kuang').mouseout(function(){
                $(this).css({
                    'background-color':'#fff'
                });
            })

        })
    </script>


@endsection