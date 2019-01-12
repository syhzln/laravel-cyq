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
    <a href="{{url('home/points')}}"><li class="active">我的积分</li></a>
    <a href="{{url('home/grade')}}"><li>好友的等级</li></a>
    <a href="{{url('home/introduction')}}"><li>成长体系介绍</li></a>
@endsection
@section('connect')
    <div id="connect_points">
        <div id="connect_points_box">
            <div class="point-mid">

                <div class="growing">
                    <div class="award-status">
                        <a href="http://www.renren.com/profile.do?id=925805295"><img width="50" height="50" src="http://hdn.xnimg.cn/photos/hdn521/20170409/1920/tiny_zaQs_ae7b000082fc1986.jpg"></a>
                        <p>第2名</p>
                    </div>
                    <div class="login-info">
                        <div>
		                        <span class="growing-title">
			                            <span class="level-icon">
			                                	<img class="levelHot-1" src="{{asset('/home/img/a.gif')}}" width="18" >
			                            </span>
		                            2级</span>
                            <span class="gray">连续登录7天，共10天</span>
                        </div>
                        <div style="" id="grade-hint" class="grade-hint">
                            {{--设置rp值 em width--}}
                            <span class="integral" href="#" alt="" title=""><em style="width: 55.0%;" class="bg"></em></span><span class="gray">51/80</span>
                        </div>
                    </div>
                </div>
                <div class="mid-section">
                    <h4><a style="float: right; font-weight: normal;" id="pri_all" href="#nogo">即刻拥有所有特权»</a> 我的特权 </h4>
                    <ul class="privilege-info">
                        <li id="pri_color_message">
                            <div class="award-status">
                                <a href="#nogo"><img width="64" height="64" src="{{asset('home/img/csly_gray.png')}}"></a>
                            </div>
                            <div class="award-intro">
                                <h2><a href="#nogo">彩色留言</a></h2>
                                <p>等级达到7级，
                                    <br>可以修改留言颜色
                                </p>
                            </div>
                        </li>
                        <li id="pri_super_emotion">
                            <div class="award-status">
                                <a href="#nogo"><img width="64" height="64" src="{{asset('home/img/cjbq.png')}}"></a>
                            </div>
                            <div class="award-intro">
                                <h2><a href="#nogo">超级表情</a></h2>
                                <p>
                                    <span style="color:red">已获得该特权</span>
                                    <br>使用更多有趣表情
                                </p>
                            </div>
                        </li>
                        <li id="pri_dress_up">
                            <div class="award-status">
                                <a href="#nogo"><img width="64" height="64" src="{{asset('home/img/syzb_gray.png')}}"></a>
                            </div>
                            <div class="award-intro">
                                <h2><a href="#nogo">首页装扮</a></h2>
                                <p>
                                    等级达到11级，
                                    <br>可以美化首页
                                </p>
                            </div>
                        </li>
                        <li id="pri_hiding_see">
                            <div class="award-status">
                                <a href="#nogo"><img width="64" height="64" src="{{asset('home/img/ysck_gray.png')}}"></a>
                            </div>
                            <div class="award-intro">
                                <h2><a href="#nogo">隐身查看</a></h2>
                                <p>
                                    等级达到15级，
                                    <br>查看好友不留脚印
                                </p>
                            </div>
                        </li>
                        <li id="pri_pickup_upgrade">
                            <div class="award-status">
                                <a href="#nogo"><img width="64" height="64" src="{{asset('home/img/js.png')}}"></a>
                            </div>
                            <div class="award-intro">
                                <h2><a href="#nogo">加速升级</a></h2>
                                <p>
                                    <span style="color:red">已获得该特权</span>
                                    <br>每天登录7分
                                </p>
                            </div>
                        </li>
                        <li id="pri_rapidity_upgrade">
                            <div class="award-status">
                                <a href="#nogo"><img width="64" height="64" src="{{asset('home/img/jisu_gray.png')}}"></a>
                            </div>
                            <div class="award-intro">
                                <h2><a href="#nogo">极速升级</a></h2>
                                <p>连续登录30天，
                                    <br>每天登录获10分
                                </p>
                            </div>
                        </li>
                    </ul>
                    <p class="forward">更多特权敬请期待......</p>
                </div>
                <div class="mid-section mb">
                    <h4>成长体系规则</h4>
                    <p class="growth-system-words">你的等级会随着积分的增加而成长，等级越高，所获得的特权和奖励越多。</p>
                    <ul class="growth-system">
                        <li>
                            <img class="levelHot-1" src="http://a.xnimg.cn/a.gif" width="18" height="18">
                            <p>种子新芽</p>
                            <p class="gray">1级</p>
                        </li>
                        <li class="next-level "></li>
                        <li>
                            <img class="levelHot-2" src="http://a.xnimg.cn/a.gif" width="18" height="18">
                            <p>绿叶</p>
                            <p class="gray">5级</p>
                        </li>
                        <li class="next-level "></li>
                        <li>
                            <img class="levelHot-3" src="http://a.xnimg.cn/a.gif" width="18" height="18">
                            <p>花苞</p>
                            <p class="gray">10级</p>
                        </li>
                        <li class="next-level "></li>
                        <li>
                            <img class="levelHot-4" src="http://a.xnimg.cn/a.gif" width="18" height="18">
                            <p>大花苞</p>
                            <p class="gray">15级</p>
                        </li>
                    </ul>
                    <p class="growth-system-words">根据登录天数的不同，太阳花也会有不同的展现。</p>
                    <ul class="growth-system clearfix">
                        <li>
                            <img class="levelHot-5" src="http://a.xnimg.cn/a.gif" width="18" height="18">
                            <p>沮丧</p>
                            <p class="gray">普通登录</p>
                        </li>
                        <li class="next-level "></li>
                        <li>
                            <img class="levelHot-6" src="http://a.xnimg.cn/a.gif" width="18" height="18">
                            <p>开心</p>
                            <p class="gray">连续登录7天以上</p>
                        </li>
                    </ul>
                </div>
                <div class="mid-section">
                    <h4>积分等级对应</h4>
                    <table class="grade-class">
                        <tbody>
                        <tr>
                            <th width="80">用户等级</th><th>所需积分</th><th width="80">用户等级</th><th>所需积分</th><th width="80">用户等级</th><th>所需积分</th>
                        </tr>
                        <tr><th>1</th><td>0分</td><th>16</th><td>8280分</td><th>31</th><td>36630分</td></tr>
                        <tr><th>2</th><td>30分</td><th>17</th><td>9750分</td><th>32</th><td>39000分</td></tr>
                        <tr><th>3</th><td>80分</td><th>18</th><td>11280分</td><th>33</th><td>41430分</td></tr>
                        <tr><th>4</th><td>150分</td><th>19</th><td>12870分</td><th>34</th><td>43920分</td></tr>
                        <tr><th>5</th><td>240分</td><th>20</th><td>14520分</td><th>35</th><td>46470分</td></tr>
                        <tr><th>6</th><td>350分</td><th>21</th><td>16230分</td><th>36</th><td>49080分</td></tr>
                        <tr><th>7</th><td>480分</td><th>22</th><td>18000分</td><th>37</th><td>51750分</td></tr>
                        <tr><th>8</th><td>560分</td><th>23</th><td>19830分</td><th>38</th><td>54480分</td></tr>
                        <tr><th>9</th><td>800分</td><th>24</th><td>21720分</td><th>39</th><td>57270分</td></tr>
                        <tr><th>10</th><td>990分</td><th>25</th><td>23670分</td><th>40</th><td>60120分</td></tr>
                        <tr><th>11</th><td>1830分</td><th>26</th><td>25680分</td><th>41</th><td>80000分</td></tr>
                        <tr><th>12</th><td>3000分</td><th>27</th><td>27750分</td><th>42</th><td>100000分</td></tr>
                        <tr><th>13</th><td>4230分</td><th>28</th><td>29880分</td><th>43</th><td>120000分</td></tr>
                        <tr><th>14</th><td>5520分</td><th>29</th><td>32070分</td><th>44</th><td>150000分</td></tr>
                        <tr><th>15</th><td>7870分</td><th>30</th><td>34320分</td><th>45</th><td>200000分</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="point-info">
                <div class="mini-section" id="">
                    <h4>快速成长小窍门</h4>
                    <div class="means-list">
                        <dl>
                            <dt>1.连续登录，获得更多积分</dt>
                            <dd>连续5天访问，每天登录获得7分</dd>
                            <dt>2.回复好友的照片、日志、状态</dt>
                            <dd>每天最多可获得10分</dd>
                            <dt>3.发日志、传照片、改状态</dt>
                            <dd>好友回复你的内容也能获得积分</dd>
                            <dt>4.使用手机网站/客户端</dt>
                            <dd>额外增加一次登录积分</dd>
                            <dt>5.使用人人桌面&nbsp;&nbsp;<a href="http://im.renren.com/desktop/rrsetup-2.0-7.exe?myscore">立即下载</a></dt>
                            <dd>额外增加一次登录积分</dd>
                            <dt>6.<a href="http://i.renren.com/pay/pre?wc=590000">升级网站VIP</a>，获得多倍积分</dt>
                            <dd>更可享用更多VIP特权哦</dd>
                        </dl>
                        <a href="http://sc.renren.com/scores/help">查看详细规则 »</a>
                    </div>
                </div>

                <div class=" bang-list ranking-module">
                    <h4>好友等级排行榜</h4>
                    <ul class="bang-left">
          {{--遍历好友排名数据 按等级查找--}}
                        <li>
                            <span class="ranking top3">1</span>
                            <span class="avatar">
			                            <a href="http://www.renren.com/profile.do?id=925805295"><img src="http://hdn.xnimg.cn/photos/hdn521/20170409/1920/tiny_zaQs_ae7b000082fc1986.jpg"></a>
			                        </span>
                            <div class="detail">
                                <p><a href="http://www.renren.com/profile.do?id=925805295" class="name" alt="积分：51">陈超</a></p>
                                <p>
                                    <span class="level-icon">
                                    <img class="levelHot-1" src="http://a.xnimg.cn/a.gif">
                                    </span><em>2级</em>
                                </p>
                            </div>
                        </li>
                        <li>
                            <span class="ranking top3">1</span>
                            <span class="avatar">
			                            <a href="http://www.renren.com/profile.do?id=925805295"><img src="http://hdn.xnimg.cn/photos/hdn521/20170409/1920/tiny_zaQs_ae7b000082fc1986.jpg"></a>
			                        </span>
                            <div class="detail">
                                <p><a href="http://www.renren.com/profile.do?id=925805295" class="name" alt="积分：51">陈超</a></p>
                                <p>
                                    <span class="level-icon">
                                    <img class="levelHot-1" src="http://a.xnimg.cn/a.gif">
                                    </span><em>2级</em>
                                </p>
                            </div>
                        </li>
                    </ul>
                    <a href="" class="ranking-more">查看更多好友等级 »</a>
                </div>

            </div>
        </div>
    </div>
@endsection