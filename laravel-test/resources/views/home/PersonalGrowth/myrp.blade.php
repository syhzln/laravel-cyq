@extends('model.rpmodel')
@section('second')
    <span class="list_hua">
             <svg class="icon hua" aria-hidden="true">
                <use xlink:href="#icon-hua"></use>
            </svg>
            &nbsp; &nbsp;个人成长：
        </span>
    <a href="{{url('home/character')}}"><li class="active">我的人品</li></a>
    <a href="{{url('home/calendar')}}"><li>我的日历</li></a>
    <a href="{{url('home/points')}}"><li>我的积分</li></a>
    <a href="{{url('home/grade')}}"><li>好友的等级</li></a>
    <a href="{{url('home/introduction')}}"><li>成长体系介绍</li></a>
@endsection
@section('connect')
<div id="connect_rp">
    <div id="connect_rp_box">
        <div id="rp_left">
            <div class="rp_rpValue">
                <div><img src="{{asset('home/img/rp01.jpg')}}"></div>
                <div class="myRP">
                    <div class="myrpValue"><p>我的人品值</p></div>
                    <div class="sumRP">总RP值：<span>&nbsp; {{$rpz}}</span></div>
                    <div class="todayRP">今日攒人品获取：<span>&nbsp;{{$rpd}}</span> &nbsp;&nbsp;刷新获取：<span>&nbsp;{{$rpf}}</span></div>
                    <a href="" target="_blank"><div class="submitRP">RP兑换中心</div></a>
                </div>
            </div>

            <div class="unlock">
                <div class="mylock"><p>我的解锁</p></div>
                <div class="unlock_list">
                    <ul id="unlockList">
                        <li class="lock"><img src="{{asset('home/img/original_dAHJ_2474000000047a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="0">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>-1</a>点<br><span id="friUnlockBox"><input type="hidden"></span></p>
                            <div></div>
                            <span class="desc">门柱</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_aa28_2e35000000067a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="2">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>-1</a>点<br><span id="friUnlockBox"><input type="hidden"></span></p>
                            <div></div>
                            <span class="desc">捏方便面</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_gwu9_2e45000000067a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="4">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p style="display: none;" data-old-display="block">需单次攒人品<br>获取<a>1</a>点<br><span id="friUnlockBox"><input type="hidden"></span></p>
                            <div></div>
                            <span class="desc">每日一攒</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_nZRY_2e55000000067a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="6">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>4</a>点<br><span id="friUnlockBox"><input type="hidden"></span></p>
                            <div></div>
                            <span class="desc">多重施法X4</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_itkl_2e65000000067a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="8">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>5</a>点<br><span id="friUnlockBox"><input type="hidden"></span></p>
                            <div></div>
                            <span class="desc">刮发票</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_CXqS_2e85000000067a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="12">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>14</a>点<br><span id="friUnlockBox"><input type="hidden"><a target="_blank" href="http://www.renren.com/369988595">龙家大少</a>已解锁</span></p>
                            <div></div>
                            <span class="desc">自摸</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_4M25_2e15000000077a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="14">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>18</a>点<br><span id="friUnlockBox"><input type="hidden"><a target="_blank" href="http://www.renren.com/369988595">龙家大少</a>已解锁</span></p>
                            <div></div>
                            <span class="desc">豹子6</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_MZlr_2e25000000077a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="16">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>20</a>点<br><span id="friUnlockBox"><input type="hidden"><a target="_blank" href="http://www.renren.com/369988595">龙家大少</a>已解锁</span></p>
                            <div></div>
                            <span class="desc">男闺蜜</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_kjBj_2e35000000077a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="18">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>25</a>点<br><span id="friUnlockBox"><input type="hidden"><a target="_blank" href="http://www.renren.com/369988595">龙家大少</a>已解锁</span></p>
                            <div></div>
                            <span class="desc">双色球</span></li>
                        <li class="lock"><img src="{{asset('home/img/original_9PWI_2e45000000077a01.jpg')}}"><div class="lockImg"></div>
                            <input type="hidden" class="IDhideValue" value="20">
                            <div class="hoverMask" style="display: block; opacity: 0;"></div><p data-old-display="block" style="display: none;">需单次攒人品<br>获取<a>30</a>点<br><span id="friUnlockBox"><input type="hidden"></span></p>
                            <div></div>
                            <span class="desc">考神</span></li>
                    </ul>
                </div>
            </div>

            <div class="helpRP">
                <div class="helpList"><p>Q&A</p></div>
                <div class="helpConnet">
                        <h3>1、什么是人品？人品有什么用？</h3>
                        <h4>1)  人品=Renren Power=RP，是你长期混迹于人人网的象征和奖励</h4>
                        <h4>2)  人品值主要可以兑换特权道具（部分道具还在开发中）；另外，如果你下手足够快，还有机会兑换精美的实物礼品</h4>
                        <h3>2、怎样获取人品值？</h3>
                        <h4>1) 【首页】点击“攒人品”按钮即可随机获取一定数量的人品值</h4>
                        <h4>2) 【首页】每半小时刷新得1点人品值</h4>
                        <h4>3) 【兑换中心】去兑换中心的幸运大转盘试试手气</h4>
                        <h3>3、如何解锁内容、解锁对我有什么好处？</h3>
                        <h4>当你今日通过点击“攒”的按钮获取的人品值恰巧符合某些特定数值时，就能够成功解锁该内容（比如数字“5”，大家吃完饭刮发票中奖最经常得到的是5元，所以对应的解锁内容就是“刮发票”；数字“9”，大家就会想到托雷斯的各种空门不进，所以对应的解锁内容就是“门柱”）<br>解锁成功后，如果发布该内容，则会获得多一次的“攒人品”机会；但是如果不发布的话，就会失去这一次宝贵的机会哦</h4>
                        <h3>4、兑换礼品有什么限制？</h3>
                        <h4>1)  礼品兑换都有等级限制</h4>
                        <h4>2)  个别特权道具有兑换\使用限制</h4>
                        <h4>3)  实物礼品会有数量限制</h4>
                    </div>
                </div>
            </div>
        {{--遍历好友的rp排行--}}
        {{--数组拿k值 排名--}}
        <div id="rp_right">
            <h4>今日好友RP排行</h4>
            <ul><span>我的排名<a>&nbsp;{{0}}</a></span></ul>

            <li><div class="rankLabel rankTop">{{0}}</div>
                <a target="_blank" href="http://www.renren.com/925805295">
                    <img src="{{asset('/home/img/cc.jpg')}}">
                </a>
                <div class="name"><a target="_blank" href="">陈超</a></div>
                <div class="score">14</div>
            </li>

        </div>
        </div>
    </div>
</div>
    @endsection