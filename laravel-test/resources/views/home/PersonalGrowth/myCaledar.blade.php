@extends('model.rpmodel')
@section('second')
    <span class="list_hua">
             <svg class="icon hua" aria-hidden="true">
                <use xlink:href="#icon-hua"></use>
            </svg>
            &nbsp; &nbsp;个人成长：
        </span>
    <a href="{{url('home/character')}}"><li>我的人品</li></a>
    <a href="{{url('home/calendar')}}"><li class="active">我的日历</li></a>
    <a href="{{url('home/points')}}"><li>我的积分</li></a>
    <a href="{{url('home/grade')}}"><li>好友的等级</li></a>
    <a href="{{url('home/introduction')}}"><li>成长体系介绍</li></a>
@endsection
@section('connect')
    <div id="connect_date">
        <div id="connect_date_box">
            <div class="date_main">
                <a href="#"><img src="{{asset('home/img/banner_new.png')}}"><p>9999</p></a>
                <div class="sc-userinfo">
                    <div class="user-login-total">
                        <a href="http://www.renren.com/profile.do?id=925805295" class="avatar">
                            <img src="{{asset('home/img/cc.jpg')}}">
                            {{--根据登录用户查找头像--}}
                        </a>
                        <div class="sc-user-detail">
                            <p class="first-line clearfix">
                                <span class="sc-user-name"></span><span>总登录</span></p>
                            <p class="second-line"><span class="sc-login-day">9</span>天</p>
                        </div>
                    </div>
                    <div class="user-login-card">
                        <img class="repair-card-icon" src="{{asset('home/img/repair-login.png')}}">
                        <div class="sc-card-detail">
                            <p class="first-line">补登录卡<img src="{{asset('home/img/repair-card-intro.png')}}"></p>
                            <p class="second-line"><span class="sc-card-num">10</span>张<a href="#nogo" class="buy-card">获得更多</a></p>
                        </div>
                        <div class="sc-intro-dialog">
                            <i class="top-icon"></i>
                            <div class="sc-intro-header clearfix">
                                <h3>什么是补登录卡</h3>
                            </div>
                            <div class="sc-intro-content">
                                <p class="intro-title">正在为连续登录天数断掉而捉急、遗憾么？来试试补登录卡吧~</p>
                                <span class="clearfix"><i></i><p class="sc-intro-p">系统会根据您的最高连续登录天数不同发1-3张初始补登录卡</p></span>
                                <span class="clearfix"><i></i><p class="sc-intro-p">从补登录卡上线开始算起，每连续登录30天，您还可以获得一张哦</p></span>
                                <span class="clearfix"><i></i><p class="sc-intro-p">最多拥有15张补登录卡</p></span>
                            </div>
                        </div>
                    </div>
                    <div class="max-login-day">
                        <img src="{{asset('home/img/max-login.png')}}">
                        <div class="max-login-num">
                            <p class="first-line">历史上最长连续登录</p>
                            <p class="second-line"><span class="max-num">6</span>天</p>
                        </div>
                    </div>
                </div>
                <div class="sc-progress-bar">
                    <div class="sc-login-info">
                        <p class="current-day">当前连续登录天数：6天</p>
                        <p class="need-day">还有<em class="sc-need-count">24</em>天获得下一张补登录卡</p>
                    </div>
                    <div>
                        {{--登陆的天数 /30 天 统计百分比--}}
                        <div class="sc-back-img">
                            <div class="sc-progress-img" style="width: 50%;">
                            </div>
                        </div>
                    </div>
                    <div class="calendar-tool">
                        <div class="check-not-login">
                            @include('model/calenbar')
                        </div>
                        <div class="calendar-login">
                            @include('model/date')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection