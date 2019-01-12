<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/home_model.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/footer.css')}}" rel="stylesheet">
    {{--引入图标--}}
    <script src="{{asset('home/css/iconfont/iconfont.js')}}"></script>
    {{--引入类--}}
    <link href="{{asset('home/css/rp_model.css')}}" rel="stylesheet">
    @yield('mycss')
    <title>@yield('title','首页')</title>
</head>
<body>
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
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" style="padding:10px;"><img src="{{asset('home/img/default_icon.png')}}" height="30" style=""></a></li>
                <li><a href="#">陈超</a></li>
                <li><a href="#">退出</a></li>
                <li style="cursor:default"><a></a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="搜索的内容">
                <button type="submit" class="btn btn-info">搜索</button>
            </form>
        </div>
    </div>
</nav>

<!-- ***************************** 第一行nav结束 ****************************** -->
<!-- ***************************** 搜索框下的一行开始 ********************************** -->
<div id="rp_top">
    <div id="rp_list">
        <ul>
            @section('second')
           <span class="list_hua">
             <svg class="icon hua" aria-hidden="true">
                <use xlink:href="#icon-hua"></use>
            </svg>
            &nbsp; &nbsp;个人成长：
        </span>
                <a href="{{url('home/character')}}"><li>我的人品</li></a>
                <a href="{{url('home/calendar')}}"><li>我的日历</li></a>
                <a href="{{url('home/points')}}"><li>我的积分</li></a>
                <a href="{{url('home/grade')}}"><li>好友的等级</li></a>
                <a href="{{url('home/introduction')}}"><li>成长体系介绍</li></a>
            @show
        </ul>
    </div>
</div>

<!-- ***************************** 搜索框下的一行结束 ********************************** -->
@section('connect')
@show
<!-- ******************************尾巴****************************************** -->
@section('foot')
    <div id="footer" style="margin: 0 auto;width: 100%;">
        <div class="ft-wrapper clearfix" style="width: 1169px;">
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
                <a href="http://fenqi.renren.com/" target="_blank">人人分期</a>
                <a href="https://licai.renren.com/" target="_blank">人人理财</a>
                <a href="http://www.woxiu.com/" target="_blank">我秀</a>
                <a href="http://zhibo.renren.com/" target="_blank">人人直播</a>
                <a href="http://www.huanlj.com/i/34886/www.renren.com" target="_blank">人人网</a>
            </p>
            <p>
                <strong>人人移动客户端下载</strong>
                <a href="http://mobile.renren.com/showClient?v=platform_rr&amp;psf=42064" target="_blank">iPhone/Android</a>
                <a href="http://mobile.renren.com/showClient?v=platform_hd&amp;psf=42067" target="_blank">iPad客户端</a>
                <a href="http://mobile.renren.com" target="_blank">其他人人产品</a>
            </p>
            <!--<p class="copyright-info">-->
            <!-- 临时添加公司信息用 -->
            <p class="copyright-info" style="margin-left:80px">
                <span>公司全称：北京千橡网景科技发展有限公司</span>
                <span>公司电话：010-84481818</span>
                <span><a href="mailto:admin@renren-inc.com">公司邮箱：admin@renren-inc.com</a></span>
                <span>公司地址：北京市朝阳区酒仙桥中路18号<br>国投创意信息产业园北楼5层</span>
                <span>违法和不良信息举报电话：027-87676735</span>
                <span><a href="http://jubao.12377.cn:13225/reportinputcommon.do" target="_blank"><img style="height: 22px;float: left; margin-left: 78px;" src="http://s.xnimg.cn/imgpro/civilization/jubaologoNew.png">网上有害信息举报中心</a></span>
                <span><img id="wenhuajingying_icon" style="height: 28px;float: left; margin-left: 60px;" src="http://s.xnimg.cn/imgpro/civilization/wenhuajingying.png"><a href="http://sq.ccm.gov.cn/ccnt/sczr/service/business/emark/toDetail/DFB957BAEB8B417882539C9B9F9547E6" target="_blank">京网文[2013]0136-030号</a></span>
                <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证090254号</a></span>
                <span>人人网?2016</span>
            </p>
        </div>
    </div>
@show
<script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('/home/js/rp_model.js')}}"></script>
{{--日历js--}}
<script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>
</body>
</html>