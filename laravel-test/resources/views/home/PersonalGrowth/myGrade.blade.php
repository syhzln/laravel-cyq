@extends('model.rpmodel')
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
    <a href="{{url('home/grade')}}"><li class="active">好友的等级</li></a>
    <a href="{{url('home/introduction')}}"><li>成长体系介绍</li></a>
@endsection
@section('connect')
    <div id="connect_grade">
            <div id="" class="full-page">
                <div class="point-main2">
                    <div class="nav-tabs2">
                        <ul class="tabs2">
                            <li class="selected2">
                                <a href="#">好友积分排行榜</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grade-list">
                        <ul class="grade-left">
                            {{-----------------------------遍历好友---------------------------------}}
                            <li>
                                <span class="ranking2 top32">
                                           1
                                </span>
                                <span class="avatar2">
                                    <a href="http://www.renren.com/profile.do?id=369988595"><img src="http://head.xiaonei.com/photos/0/0/men_tiny.gif"></a>
                                </span>
                                <div class="detail2">
                                    <p><span class="desc2">姓名:</span><a href="http://www.renren.com/profile.do?id=369988595" class="name">龙家大少</a>
                                    </p>
                                    <p><span class="desc2">积分:</span><em>1696</em><span class="desc2">等级:</span>
                                        <span class="level-icon">
                                           <img class="levelHot-3" src="{{asset('home/img/a.gif')}}">
                                        </span>
                                        <em>10级</em>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <span class="ranking2 top32">
                                           1
                                </span>
                                <span class="avatar2">
                                    <a href="http://www.renren.com/profile.do?id=369988595"><img src="http://head.xiaonei.com/photos/0/0/men_tiny.gif"></a>
                                </span>
                                <div class="detail2">
                                    <p><span class="desc2">姓名:</span><a href="http://www.renren.com/profile.do?id=369988595" class="name">龙家大少</a>
                                    </p>
                                    <p><span class="desc2">积分:</span><em>1696</em><span class="desc2">等级:</span>
                                        <span class="level-icon">
                                           <img class="levelHot-3" src="{{asset('home/img/a.gif')}}">
                                        </span>
                                        <em>10级</em>
                                    </p>
                                </div>
                            </li>
                            {{------------------------------遍历好友----------------------------------}}
                        </ul>
                        <ul class="grade-right">
                            <li>
                                <span class="ranking2 top32">
                                    2
                                </span>
                                <span class="avatar2">
                                    <a href="http://www.renren.com/profile.do?id=925805295"><img src="http://hdn.xnimg.cn/photos/hdn521/20170409/1920/tiny_zaQs_ae7b000082fc1986.jpg"></a>
                                </span>
                                <div class="detail2">
                                    <p><span class="desc2">姓名:</span><a href="http://www.renren.com/profile.do?id=925805295" class="name">陈超</a>
                                    </p>
                                    <p><span class="desc2">积分:</span><em>51</em><span class="desc2">等级:</span>
                                        <span class="level-icon">
                                            <img class="levelHot-1" src="{{asset('home/img/a.gif')}}">
                                        </span>
                                        <em>2级</em>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <span class="ranking2 top32">
                                    2
                                </span>
                                <span class="avatar2">
                                    <a href="http://www.renren.com/profile.do?id=925805295"><img src="http://hdn.xnimg.cn/photos/hdn521/20170409/1920/tiny_zaQs_ae7b000082fc1986.jpg"></a>
                                </span>
                                <div class="detail2">
                                    <p><span class="desc2">姓名:</span><a href="http://www.renren.com/profile.do?id=925805295" class="name">陈超</a>
                                    </p>
                                    <p><span class="desc2">积分:</span><em>51</em><span class="desc2">等级:</span>
                                        <span class="level-icon">
                                            <img class="levelHot-1" src="{{asset('home/img/a.gif')}}">
                                        </span>
                                        <em>2级</em>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
    </div>
@endsection