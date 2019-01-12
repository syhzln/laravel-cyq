<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/home_model.css')}}" rel="stylesheet">
     <link href="{{asset('home/css/footer.css')}}" rel="stylesheet">
     <link href="{{asset('home/css/say.css')}}" rel="stylesheet">
    <link href="{{asset('/home/css/faceMocion.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <style type="text/css">
        .pd30{margin-top: 50px;}
    </style>
    @yield('mycss')
    <title>@yield('title','人人网')</title>
</head>
<body>
@section('in_top')
<!--  **************************** 第一行nav ********************************** -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #227DC5;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{asset('home/img/rr.png')}}" width="50"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                 @if((Auth::user()->avatar) == 'Home/img/default.jpg')
                    <li><a href="#" style="padding:10px;"><img src="{{asset(Auth::user()->avatar)}}" height="30" style=""></a></li>
                 @else
                    <li><a href="#" style="padding:10px;"><img src="{{asset('img/home/'.Auth::user()->avatar)}}" height="30" style=""></a></li>
                @endif

                <li><a href="{{url('/home/information')}}">{{Auth::user()->name}}</a></li>
                <li><a href="{{url('/logout')}}">退出</a></li>
                <li style="cursor:default"><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;</a></li>
                @else
                    <li><a href="#" style="padding:10px;"><img src="{{asset('home/img/default_icon.png')}}" height="30" style=""></a></li>
                    <li><a href="{{url('home/login')}}">登陆</a></li>
                    <li style="cursor:default"><a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;</a></li>
                @endif
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="搜索的内容">
                <button type="submit" class="btn btn-info">搜索</button>
            </form>
        </div>
    </div>
</nav>
@show()
<!-- ***************************** 第一行nav结束 ****************************** -->
@section('in_left')
<!-- ***************************** 左边的列开始 ******************************* -->
<div id="model_left">
<ul>
<a href="{{url('/home/index')}}"><li><img src="{{asset('home/img/1.png')}}">首页</li></a>
<a href="{{url('/home/myindex')}}"><li><img src="{{asset('home/img/3.png')}}">个人主页</li></a>
<a href="{{url('/home/photo')}}"><li><img src="{{asset('home/img/4.png')}}">我的相册</li></a>
<a href="{{url('/home/friends')}}"><li><img src="{{asset('home/img/5.png')}}">好友</li></a>
<a href="{{url('/home/words')}}"><li><img src="{{asset('home/img/liuyan.png')}}">留言</li></a>
<a href="{{url('/home/game')}}"><li><img src="{{asset('home/img/yingyong.png')}}">应用</li></a>
<a href="{{url('/home/report')}}"><li><img src="{{asset('home/img/report.png')}}">举报</li></a>
<a href="{{url('/home/aboutme')}}"><li><img src="{{asset('home/img/6.png')}}">关于我们</li></a>
</ul>
</div>
<!-- ***************************** 左边的列结束 ********************************** -->
@show()
<!-- ***************************** 搜索框下的一行开始 ********************************** -->
@section('fresh')
<div id="change_infof">
    <div id="change_info">
        <ul>
        @section('second')
        <a href="{{url('home/myindex')}}"><li>我的主页</li></a>
        <a href="{{url('home/information')}}"><li>资料</li></a>
        <a href="{{url('home/photo')}}"><li>相册</li></a>
        <a href="{{url('home/friends')}}"><li>好友</li></a>
        <a href="{{url('home/say')}}"><li>说说</li></a>
        <a href="{{url('home/diary')}}"><li>日志</li></a>
        <a href="{{url('home/words')}}"><li>留言</li></a>
            @show()
        </ul>
    </div>
</div>
@show
<!-- ***************************** 搜索框下的一行结束 ********************************** -->
@section('main')
<!-- ***************************** 主内容开始 ********************************** -->


<!-- ***************************** 主内容结束 ********************************** -->
@show()

@section('foot')
    <div id="footer" style="width: 860px;margin: 0 auto">
        <div class="ft-wrapper clearfix" style="width:100%;">
            <p>
                <strong>玩转人人</strong>
                <a href="http://page.renren.com/register/regGuide/" target="_blank">公共主页</a>
                <a href="http://zhibo.renren.com" target="_blank">美女直播</a>
                <a href="http://support.renren.com/helpcenter" target="_blank">客服帮助</a>
                <a href="http://www.renren.com/siteinfo/privacy" target="_blank">隐私</a>
            </p>
            <p>
                <strong>商务合作</strong>
                <a href="http://page.renren.com/marketing/index" target="_blank">品牌营销</a>
                <a href="http://bolt.jebe.renren.com/introduce.htm" class="l-2" target="_blank">中小企业<br>自助广告</a>
                <a href="http://dev.renren.com/" target="_blank">开放平台</a>
                <a href="http://dsp.renren.com/dsp/index.htm" target="_blank">人人DSP</a>
            </p>
            <p>
                <strong>公司信息</strong>
                <a href="http://www.renren-inc.com/zh/product/renren.html" target="_blank">关于我们</a>
                <a href="http://page.renren.com/gongyi" target="_blank">人人公益</a>
                <a href="http://www.renren-inc.com/zh/hr/" target="_blank">招聘</a>
                <a href="#nogo" id="lawInfo">法律声明</a>
            </p>
            <p>

               <strong>友情链接</strong>
                @if(!empty($links))
                @foreach($links as $link)
                <a href="{{$link['link']}}" target="_blank">{{$link['name']}}</a>
                @endforeach
                @else
                    <a href="https://licai.renren.com/" target="_blank">人人理财</a>
                    <a href="http://www.woxiu.com/" target="_blank">我秀</a>
                    <a href="http://zhibo.renren.com/" target="_blank">人人直播</a>
                    <a href="http://www.huanlj.com/i/34886/www.renren.com" target="_blank">人人网</a>--}}
                @endif

            </p>
            <p>
                <strong>人人移动客户端下载</strong>
                <a href="http://mobile.renren.com/showClient?v=platform_rr&amp;psf=42064" target="_blank">iPhone/Android</a>
                <a href="http://mobile.renren.com/showClient?v=platform_hd&amp;psf=42067" target="_blank">iPad客户端</a>
                <a href="http://mobile.renren.com" target="_blank">其他人人产品</a>
            </p>
            <!--<p class="copyright-info">-->
            <!-- 临时添加公司信息用 -->
            <p class="copyright-info">
                <span>公司全称：北京千橡网景科技发展有限公司</span>
                <span>公司电话：010-84481818</span>
                <span><a href="mailto:admin@renren-inc.com">公司邮箱：admin@renren-inc.com</a></span>
                <span>公司地址：北京市朝阳区酒仙桥中路18号<br>国投创意信息产业园北楼5层</span>
                <span>违法和不良信息举报电话：027-87676735</span>
                <span><a href="http://jubao.12377.cn:13225/reportinputcommon.do" target="_blank"><img style="height: 22px;float: left; margin-left: 78px;" src="http://s.xnimg.cn/imgpro/civilization/jubaologoNew.png">网上有害信息举报中心</a></span>
                <span><img id="wenhuajingying_icon" style="height: 28px;float: left; margin-left: 60px;" src="http://s.xnimg.cn/imgpro/civilization/wenhuajingying.png"><a href="http://sq.ccm.gov.cn/ccnt/sczr/service/business/emark/toDetail/DFB957BAEB8B417882539C9B9F9547E6" target="_blank">京网文[2013]0136-030号</a></span>
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证090254号</a></span>
                <span>人人网©2016</span>
            </p>
        </div>
    </div>

@show()

<!-- **************************** jquery开始到最后 ********************************* -->
<script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/js/home_model.js')}}"></script>
<script src="{{asset('home/js/comment.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/jquery-1.10.2.min.js')}}"></script>
<!-- <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
@section('my_js')
    @show()


</body>
</html>