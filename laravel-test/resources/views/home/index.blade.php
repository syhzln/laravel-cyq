@extends('model.homemodel')

@section('main')





<div class="model_main">
<div style="width:760px;" id="model_main">
    {{--左边的--}}
    @section('model_main_left')
    <div id="model_main_left" style="float: left">
        
        <div id="qq" style="margin-top:0">
            <p>有什么新鲜事想告诉大家?</p>
            <div style="text-align: right">
                <form action="{{url('/dosay')}}" method="post">
                    {{csrf_field()}}
                    <textarea name="content" class="message" style="resize: none"  ></textarea>
                    <input type="submit" value="发表"  class="btn btn-info ">
                </form>
            </div>
        </div>
        <div id='kuang' style="width: 50px;height: 25px;background-color: #333;border-radius:2px;cursor:pointer;position: fixed;top:550px;right: 0px;color: #fff;font-size: 10px;text-align: center;line-height: 25px;">意见反馈</div>
       
        <div id="beijin" class="ui-widget-overlay ui-front" style=" display: none;background:#fff;position: fixed;top: 0;left: 0;width: 100%;height: 100%;opacity: .8;z-index: 1100"></div>
            {{--意见反馈--}}

            <div id="fankui" style="display: none;position: fixed;height: auto; width: 522px; top: 200px; left: 412.5px; box-shadow: 0 0 23px 0 rgba(22,5,7,.3);border-radius: 3px;border: 1px solid #d4d4d4;background: #f8f8f8;z-index: 1100;">
                <div style="padding: 20px 30px;position: relative;z-index: 1;">
                    <span id="ui-id-11" style="font-size: 18px;line-height: 25px;">建议反馈</span>
                    <button id="cuo" style="position: absolute;right: 46px; top: 20px;width: 20px;padding: 0;height: 20px;line-height: 20px;border: none;overflow: hidden;z-index: 1;box-shadow: none;background: 0 0;font-size: 30px">×</button>
                </div>
                <form action="{{url('/view')}}" method="post">
                    {{csrf_field()}}
                <div style="padding: 0 30px;margin-bottom: 20px;">
                    <textarea name="content" placeholder="建议描述(必填)" style="display: block;width: 440px;height: 160px;border: 1px solid #ddd;border-bottom: none;padding: 10px;font-size: 14px;outline: 0;resize: none;"></textarea>
                </div>
                <div style="background: #fff;padding: 20px 30px;">
                    <div style="text-align: right">
                        <input type="submit" value="确认" class="btn btn-default">
                    </div>
                </div>
                </form>
            </div>

<script>
    $(function(){
        $('#kuang').click(function(){
            $(this).siblings('#fankui').css('display','block');
            $(this).siblings('#beijin').css('display','block');
        })
        $('#cuo').click(function(){
            $(this).parent().parent('#fankui').css('display','none');
            $(this).parent().parent().siblings('#beijin').css('display','none');
        })

    })
</script>
        <div id="indexfind">

        <div id="index_ad">
            @if($bigadvert==[])
                <a href="http://www.4399.com/flash/182762_2.htm" target="_blank"><img src="{{asset('home/img/ad.jpg')}}" title="点了会很爽" width="500" height="300"></a>
            @else
                @foreach($bigadvert as $b)
                    <a href="{{$b['link']}}" target="_blank"><img src="{{asset($b['photo_path'].'/'.$b['photo_name'])}}" title="{{$b['title']}}" width="500" ></a>
                @endforeach
            @endif
        </div>

        {{-------------------------------------- 朋友圈内容 ---------------------------------------------}}
        @forelse($comment as $val)
        <div class="index_friends">
            <div class="index_onefriend">
                <!-- 头像 -->
                <div class="index_friendimg" >
                    @if($val->avatar == 'home/img/default.jpg')
                        <img src="{{asset('home/img/default.jpg')}}" width="50" >
                    @else
                        <img src="{{asset('img/home/'.$val->avatar)}}" width="50">
                    @endif
                </div>
                <!-- 谁什么时候发表什么 -->
                <div class="index_friendinfo">
                    <div>
                        <div style="float: left">{{$val->name}}</div>
                        <div style="float: right;">下箭头</div>
                    </div>
                    <div><br>向好友发布状态</div>
                </div>
            </div>
            <div class="index_friendstext">
                {{$val->content}}
            </div>
            
            {{-- 点赞分享 --}}
            <div class="index_friendssure">
                <a href="" class="btn btn-default">点赞</a>&nbsp; &nbsp;
                <a href="" class="btn btn-default">分享</a>
            </div>
            {{-- 评论区域 --}}
{{--+++++++++++++++++++++++++++评论开始++++++++++++++++++++++++++++++++++++++++++--}}


            <div class="index_comment">
                {{---------------判断文章的评论数大于2条时隐藏---------------------}}
                @if(count($val->comment) > 2)
                    <div class="limit">
                        @forelse($val->comment as $v)
                            <div class="index_friendscomment_list">
                                {{--查询用户的头像和用户的name--}}
                                @if($val->avatar == 'home/img/default.jpg')
                                    <img src="{{asset('home/img/default.jpg')}}" width="30" height="30" style="float: left;margin-bottom:10px;">
                                @else
                                    <img src="{{asset('img/home/'.$val->avatar)}}" width="30" height="30" style="float: left;margin-bottom:10px;">
                                @endif<span style="line-height:30px;"> &nbsp;</span>
                                <div class="index_friendscomment_content">
                                    <p><span class="friends_name"><a>{{$v->name}}</a></span><span class="friends_time">{{$v->utime_c}}</span>
                                        <svg class="icon" aria-hidden="true">
                                            <use xlink:href="#icon-dianzan"></use>
                                        </svg>+
                                        <span class="tt">{{$v->num}}</span>
                                        {{--判断是否是本用户--}}
                                        {{---------------------------------------------------------------------}}
                                        @if(Auth::check())
                                            {{--遍历得到评论的用户--}}
                                            @if(Auth::user()->name == $v->name)
                                                <span class="friends_delete"><a class="delete" href="{{url('/home/comment/delete/'.$v->id_c)}}" >删除</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>
                                            @else
                                                <span class="friends_zan"><a>回复</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>
                                            @endif
                                        @else
                                            <span></span>
                                        @endif
                                    </p>
                                    <p> {!! $v->content_c !!} </p>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    @else
                @foreach($val->comment as $v)
                    <div class="index_friendscomment_list">
                        {{--查询用户的头像和用户的name--}}
                        @if($val->avatar == 'home/img/default.jpg')
                            <img src="{{asset('home/img/default.jpg')}}" width="30" height="30" style="float: left;margin-bottom:10px;">
                        @else
                            <img src="{{asset('img/home/'.$v->avatar)}}" width="30" height="30" style="float: left;margin-bottom:10px;">
                        @endif<span style="line-height:30px;"> &nbsp;</span>
                        <div class="index_friendscomment_content">
                            <p>
                                <span class="friends_name">
                                    <a>{{$v->name}}</a>
                                </span>
                                <span class="friends_time">{{$v->utime_c}}</span>
                                <svg class="icon" aria-hidden="true">
                                    <use xlink:href="#icon-dianzan"></use>
                                </svg>
                                <span class="tt">{{$v->num}}</span>
                                {{--判断是否是本用户--}}
                                {{---------------------------------------------------------------------}}
                                @if(Auth::check())
                                    {{--遍历得到评论的用户--}}
                                    @if(Auth::user()->name == $v->name)
                                    <span class="friends_delete"><a class="delete" href="{{url('/home/comment/delete/'.$v->id_c)}}" >删除</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>
                                    @else
                                    <span class="friends_zan"><a class="receive">回复</a><a class="zan" value="{{$v->id_c}}">赞</a><a class="zan2" value="{{$v->id_c}}" style="display: none;">取消</a></span>
                                    @endif
                                @else
                                    <span></span>
                                @endif
                            </p>
                            <p> {!! $v->content_c !!} </p>
                        </div>
                    </div>
                    @endforeach
                @endif
                @if(count($val->comment) > 2)
                <div class="limit_more"><a>显示更多评论</a></div>
                @endif
                <form method="post" action="{{url('/home/comment/add')}}" name="comment_form">
                <div class="index_friendscomment">
                    @if(Auth::check())
                        <img src="{{asset('img/home/'.$icon)}}" style="height:30px;width:30px;float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
                    @else
                        <img src="{{asset('home/img/default.jpg')}}" style="height:30px;width:30px;float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
                    @endif
                    {{csrf_field()}}
                        <input type="hidden" value="{{Auth::user()->id}}" name="uid">
                        <input type="hidden" value="{{$val->id_d}}" name="tid">
                        <input type="hidden" value="{{$val->uid}}" name="tuid">
                    <textarea name='1' maxlength="150" class="index_friendstextarea  form-control" type="text"  data-var="@heading-color" placeholder="评论..." style="width: 415px;height:30px;"></textarea>
                        @include('/home/face')
                        <span class="index_friendshint"><span class="index_changenum">0</span>/150字</span>
                    <button onclick="form.submit()" class="index_friendssureinfo btn btn-success btn-sm" style="display: none;">评论</button>
                </div>
                </form>
            </div>

{{-------------------------------------评论结束---------------------------------------}}
        </div>
        @empty
            <p>空空空</p>
        @endforelse

        </div>
    </div>
    @show()
    {{-- 右边的 --}}
    <div id="model_main_right" style="width:240px;float: left">
        @include('/home/Intergral/index')
        @if($smalladvert==[])

        @else
            @foreach($smalladvert as $b)
                <a href="{{$b['link']}}" target="_blank"><img src="{{asset($b['photo_path'].'/'.$b['photo_name'])}}" title="{{$b['title']}}" width="240" style="margin-top:15px;" ></a>
            @endforeach
        @endif
        <div style="width:240px;"><iframe src="{{url('/date')}}" frameborder="0" height="750px" width="240px" scrolling="no" style="background-color: #fff;margin-top: 20px;overflow: hidden;">
        </iframe></div>
        <iframe id='box' src="{{url('/news')}}" frameborder="0" height="780px" width="240px" scrolling="no" style="background-color: #fff;margin-top: 20px;overflow: hidden;">
        </iframe>
    </div>
</div>
</div>
{{--===========================================================================jq表情===============================================================================--}}
<script type="text/javascript" src="{{asset('/js/jquery-1.10.2.min.js')}}"></script>
<script >

    //点击小图片，显示表情
    $(".bq").click(function(e){

        $(this).siblings(".face").slideDown();//慢慢向下展开

        e.stopPropagation();   //阻止冒泡事件

    });
    //在桌面任意地方点击，他是关闭
    $(document).click(function(){

        $(".face").slideUp();//慢慢向上收

    });
    //点击小图标时，添加
    $(".face ul li").click(function(e){
        e.stopPropagation();   //阻止冒泡事件
        var simg=$(this).find("img");
        $(this).parent().parent().parent().parent().siblings(".index_friendstextarea").val($(this).parent().parent().parent().parent().siblings(".index_friendstextarea").val()+simg.attr('title'));

    });

</script>
{{--======================================================jq添加赞=============================================--}}

<script>
    $(function(){
        $('.index_comment .zan').on('click', function(){
            var $cid=$(this).attr('value');
            var $aa = '{{url('/home/comment/zan/')}}';

            $(this).hide();
            $(this).siblings('.zan2').show();
            $_this = $(this);

            $.ajax({
                url:$aa+"/"+$cid,
                type:'get',
                data:'cid='+$cid,
                success:function(data){
                    var a  = parseInt(data);
                    $new=$_this.parents().siblings('.tt').text();
                    $new=Number($new)+Number(1);
                    $new=$_this.parents().siblings('.tt').text($new);
                },
                error:function(){
                    alert('点赞失败！');
                },
                async:true
            })
        })
        $('.index_comment .zan2').on('click', function(){
            var $cid=$(this).attr('value');
            $(this).hide();
            $(this).siblings('.zan').show();
            $_this = $(this);
            $.ajax({
                url:'/home/comment/zan2/'+$cid,
                type:'get',
                success:function(data){
                    var a  = parseInt(data);
                    $_this.parents().siblings('.tt').text(a);
                },
                error:function(){
                    alert('取消失败！');
                },
                async:true
            })
        })
    })
</script>


{{-------------------------------------------------------------------------------------------}}

@endsection
