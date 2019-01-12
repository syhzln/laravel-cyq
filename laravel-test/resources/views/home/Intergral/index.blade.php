<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>积分管理</title>

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="apple-touch-icon" href="http://a.xnimg.cn/wap/apple_icon_.png">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    {{--引入css--}}
    <link rel='stylesheet' href="{{asset('home/css/Intergral.css')}}">
    {{--引入图标--}}
    <script src="{{asset('home/css/iconfont/iconfont.js')}}"></script>
    {{--引入js--}}
    <script src='{{asset("js/jquery-1.8.3.min.js")}}'></script>
</head>
{{--使用js实现选项卡的切换--}}
<body>
@if(count($errors) > 0)
    <div class="alert alert-danger" style="width:100%;height:50px;padding:0;line-height:30px;text-align:center;margin:0 auto;!important;">
        <ul style="list-style: none;height:20px;">
            @foreach($errors->all() as $error)
            {{$error}}
            @endforeach
        </ul>
    </div>
@endif
<div id='lifes'>
    <ul id='optiond'>
        <li class='active'>攒人品</li>
        <li>最近来访</li>
        {{--用户的来访个数--}}
        <li>生日提醒</li>
    </ul>
    <ul id='card'>
        <li class='active'>
            {{--js计时3600秒切换还原图片zan01/zan--}}
            <a href="{{url('home/intergral/timeD')}}">
                <div class="rp_01">
                    @if($t == 0)
                    <span class="zan">
                        <img src="{{asset('home/img/zan.png')}}">
                    </span>
                    <div class="zanTop"></div>
                    <div id="rp_01_Up">已赞</div>
                    @else
                        <span class="zan">
                        <img src="{{asset('home/img/zan01.png')}}">
                    </span>
                        <div class="zanTop"></div>
                        <div id="rp_01_Up">点击即可随机获取人品值</div>
                        @endif
                </div>
            </a>
            {{--统计总rp 今日rp--}}
            <a href="{{url('/home/character')}}"><div class="rp_02"><p id="pp">总RP值：<span>{{$rpz or 0}}</span></p><p id="pp">今日RP值：<span>{{$rpd or 0}}</span></p><div id="rp_02_Up">点击查看更多</div></div></a>
            {{--刷新的rp,rp值不能超过2位数--}}
            <a><div class="rp_03"><p>刷新已得</p><span>{{$rpf or 0}}</span>RP
                    <div id="rp_032_Up">立即刷新页面即可获得1点RP</div>
                    <div id="rp_03_Up">每半小时刷新页面可获得1点RP，距离下<br>次还有
                        {{$sub or '30分00秒'}}。
                    </div>
                </div>
            </a>

            <div id="help"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-wenhao"></use></svg>
                <div id="rp_Help_Up">
                    <h5>什么是攒人品？</h5>
                    <dl>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>人品值=Renren Power,是你长期混迹于人人网的象征</span></div></dd>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>每日点击一下"攒"可随机获得一定人品值</span></div></dd>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>每半小时刷新页面，也可得到1点人品值</span></div></dd>
                        <dd><div class="helpList"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-duigou"></use></svg><span>积攒来的人品值可以兑换各种心仪的礼品</span></div></dd>
                    </dl>
                </div>
            </div>
        </li>
        <li>
            {{--当没访问者时显示这，后台遍历来访的用户--}}
{{--            @if(isset($visit))--}}
                <div id="visit">
                    <div id="visitTop">
                        <div id="visitTopLeft">{{0}}人</div>
                        <div id="visitTopRight">
                            <a href="{{url('home/comeToVisit')}}"><div class="visitMore">
                                <svg class="icon" aria-hidden="true">
                                    <use xlink:href="#icon-dian"></use>
                                </svg>
                                <div id="visit_more_Up">更多来访</div>
                            </div></a>
                            {{--做隐藏--}}
                            <div class="visitCut">
                            <svg class="icon left" aria-hidden="true">
                                <use xlink:href="#icon-fanhui"></use>
                            </svg><div id="visit_left_Up">上一页</div>
                            <svg class="icon right" aria-hidden="true">
                                <use xlink:href="#icon-jinru"></use>
                            </svg><div id="visit_right_Up">下一页</div>
                            </div>
                        </div>
                    </div>
                    <div id="visitMain">
{{--                        @foreach($visiter as $v)--}}
                            <div class="visitIcon"><div id="visit_01_Up">{{ '好友'}}</div></div>
                            {{--@endforeach--}}
                    </div>
                </div>
                {{--@else--}}
                <div id="visitNull"><p>
                <svg class="icon" aria-hidden="true">
                     <use xlink:href="#icon-daku"></use>
                </svg>还没有人来访问过你的页面</p>
                </div>
                {{--@endif--}}
        </li>
        {{-----------------------------------------------------------------------------好友生日提醒------------------------------------------}}
        <li>
            {{--当一周内没有好友的生日显示下面--}}
            <div id="birthday">
                <p class="birthMore">
                    <a href="{{url('/home/calendar')}}"><svg class="icon" aria-hidden="true"><use xlink:href="#icon-dian"></use></svg></a>
                </p>
                <div id="birth_more_Up">更多好友生日</div>
                @if(!empty($friends))
                    <div class="birthList">
                        @forelse($ufriend as $bir)
                            <div class="birthIcon">
                                @if($bir->avatar != 'home/img/default.jpg')
                                <img src="{{asset('img/home/'.$bir->avatar)}}" style="width: 32px;height: 32px;">
                                @else
                                    <img src="{{asset($bir->avatar)}}" style="width: 32px;height: 32px;">
                                    @endif
                                <div id="birth_01_Up" >{{$bir->name}}</div>
                                <input type="hidden" id="birth_id"  value="{{$bir->id}}">
                            </div>
                            @empty
                            <span>最近一周没有好友过生日哦</span>
                        @endforelse
                    </div>
                    @endif
                <img src="{{asset('home/img/birthday.png')}}">
            </div>
        </li>
    </ul>
</div>
{{--=============================祝福语========================================--}}
<div id="zufu" style="display: none;position: fixed;height: auto; width: 422px; top: 226px; left: 383px;;box-shadow: 0 0 23px 0 rgba(22,5,7,.3);border-radius: 15px;border: 1px solid #d4d4d4;background: #f8f8f8;z-index: 1200;">
    <div style="padding: 15px 20px;position: relative;z-index: 1000;">
        <span id="ui-id-11" style="font-size: 18px;line-height: 25px;">生日祝福</span>
        <button id="xa" style="position: absolute;right: 46px; top: 20px;width: 20px;padding: 0;height: 20px;line-height: 20px;border: none;overflow: hidden;z-index: 1;box-shadow: none;background: 0 0;font-size: 30px">×</button>
    </div>
    <form action="{{url('/home/gift')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="uid" value="{{$uid}}">
        <input type="hidden" name="gid" value="" id="gidv">
        <div style="padding: 0 30px;margin-bottom: 20px;">
            <textarea name="gift" placeholder="请送上祝福！！！" style="display: block;width: 340px;height: 100px;border: 1px solid #ddd;border-bottom: none;padding: 10px;font-size: 14px;outline: 0;resize: none;"></textarea>
        </div>
        <div style="background: #fff;padding: 10px 20px;border-radius: 15px;">
            <div style="text-align: right">
                <input type="submit" value="发送" class="btn btn-info">
            </div>
        </div>
    </form>
</div>
{{-----------------------------------------------------------------------}}
<script>
    $(function(){
        $('#birthday').on('click','#birth_01_Up',function(){
            $('#zufu').css('display','none');
            $val=$(this).siblings('#birth_id').val();
            $(this).parent().parent().parent().parent().parent().parent().siblings('#zufu').children().children('#gidv').val($val);
            $(this).parent().parent().parent().parent().parent().parent().siblings('#zufu').css('display','block');
        })
        $('#zufu').on('click','#xa',function(){
            $('#zufu').css('display','none');
            $(this).parent().parent('#zufu').css('display','none');
        })
    })
</script>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
{{--引入Intergral.js--}}
<script src="{{asset('home/js/Intergral.js')}}"></script>
</body>
</html>

