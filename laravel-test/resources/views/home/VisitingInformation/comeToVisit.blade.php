@extends('model.rpmodel')
@section('mycss')
    <link href="{{asset('home/css/visit.css')}}" rel="stylesheet">
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    @endsection
@section('second')
    <span class="list_hua" style="margin-right: 20px;">
            &nbsp; 来访信息
        </span>
    <a href="{{url('home/comeToVisit')}}"><li class="active">最近来访</li></a>
    <a href="{{url('home/accessed')}}"><li >我访问过</li></a>
@endsection
@section('connect')
    <div class="bd-main">
        <div class="bd-content clearfix">
            <div id="visitme_all" class="footwall visitme">
                <div class="visitmeheader">
                    <span>今日人气&nbsp;:&nbsp;13</span>
                    <span>本周人气&nbsp;:&nbsp;35</span>
                    <span id="visit_times">37人看过我的主页</span>
                    <span class="rightset" data-privacyfoot="925805295">设置隐私名单</span>
                </div>
                <div id="footwall_visitme">
                    {{--========================遍历来访用户================================--}}
                    <div class="footcard">
                        <a class="head" href="http://www.renren.com/profile.do?id=369988595" namecard="369988595">
                            <img src="{{asset('home/img/men_main.gif')}}" onload="cutImg(this,168,150)" width="186" height="150" style="margin-left: -9px;">
                        </a>
                        <div class="content">
                            <ul class="leftmenu">
                                <li class="name">
                                    <a href="http://www.renren.com/profile.do?id=369988595" namecard="369988595" title="龙家大少">龙家大少</a></li>
                                <li class="time">4月10日</li>
                            </ul>
                            <a class="toggleshow" href="#nogo"></a>
                            <ul class="rightmenu" data-id="369988595">
                                <li class="deletFoot">删除脚印</li>
                                <li class="addFocus">加为特别关注</li>
                            </ul>
                            <a class="ui-button ui-button-blue add-friend-btn talk" onclick="window.webpager.talk('369988595');" href="#nogo" data-id="369988595" data-name="龙家大少&quot;">
                                <span class="ui-icon ui-iconfont" onclick="window.webpager.talk('');">
                                    <svg class="icon duihua1" aria-hidden="true">
                                           <use xlink:href="#icon-duihua1"></use>
                                    </svg>
                                </span>
                                <span class="ui-button-text">聊天</span>
                            </a>
                        </div>
                    </div>
                    <div class="footcard">
                        <a class="head" href="http://www.renren.com/profile.do?id=369988595" namecard="369988595">
                            <img src="{{asset('home/img/men_main.gif')}}" onload="cutImg(this,168,150)" width="186" height="150" style="margin-left: -9px;">
                        </a>
                        <div class="content">
                            <ul class="leftmenu">
                                <li class="name">
                                    <a href="http://www.renren.com/profile.do?id=369988595" namecard="369988595" title="龙家大少">龙家大少</a></li>
                                <li class="time">4月10日</li>
                            </ul>
                            <a class="toggleshow" href="#nogo"></a>
                            <ul class="rightmenu" data-id="369988595">
                                <li class="deletFoot">删除脚印</li>
                                <li class="addFocus">加为特别关注</li>
                            </ul>
                            <a class="ui-button ui-button-blue add-friend-btn talk" onclick="window.webpager.talk('369988595');" href="#nogo" data-id="369988595" data-name="龙家大少&quot;">
                                <span class="ui-icon ui-iconfont" onclick="window.webpager.talk('');">
                                    <svg class="icon duihua1" aria-hidden="true">
                                           <use xlink:href="#icon-duihua1"></use>
                                    </svg>
                                </span>
                                <span class="ui-button-text">聊天</span>
                            </a>
                        </div>
                    </div>
                    {{--===================================================================--}}
                </div>
            </div>

            <div id="myvisit_all" class="footwall myvisit" style="display:none;">
                <ul id="footwall_myvisit">
                    <li>正在加载...</li>
                    <!--  内容  -->
                </ul>
            </div>
        </div>
    </div>
    <script src="{{asset('home/js/visit.js')}}"></script>
@endsection