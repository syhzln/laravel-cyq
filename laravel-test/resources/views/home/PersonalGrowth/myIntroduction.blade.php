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
    <a href="{{url('home/grade')}}"><li>好友的等级</li></a>
    <a href="{{url('home/introduction')}}"><li class="active">成长体系介绍</li></a>
@endsection
@section('connect')
    <div id="connect_reward">
        <div id="" class="full-page">
            <div id="" class="introduction-main">
                <div id="" class="section">
                    <h2>积分成长体系介绍</h2>
                    <p>人人网从2010年3月10日开始推出用户成长体系，只要每天登录人人网，或者写写状态，传下照片即可轻松获取积分，积分增加，等级会不断提升，随着等级的提升将有机会得到人人网提供的各种奖励，以及使用相关特权。</p>
                </div>
                <div class="section" id="">
                    <h2>积分成长体系奖励</h2>
                    <p>随着用户的等级提升，就有机会获得人人网送出的礼物，有时候还有抽奖机会。<br><strong>奖品包括：</strong>VIP会员，礼券，专属主页装扮，人人网T恤衫等，以及更多神秘礼物，<a href="">快来看看现在可以领取什么奖励吧 »</a></p>
                </div>
                <div id="" class="section">
                    <h2>如何获得积分</h2>
                    <div id="" class="section-padding">
                        <table>
                            <tbody><tr>
                                <th width="120">用户行为</th><th colspan="2">产生积分</th><th width="130">积分上限</th>
                            </tr>
                            <tr>
                                <th rowspan="7">登录人人网</th><td>连续登录天数小于5天</td><td>每次登录+5分</td><td rowspan="7">每天只计一次</td>
                            </tr>
                            <tr>
                                <td width="292">连续登录天数大于5天小于30天</td><td width="120">每次登录+7分</td>
                            </tr>
                            <tr>
                                <td>连续登录天数30天以上</td><td>每次登录+10分</td>
                            </tr>
                            <tr>
                                <td>手机登录人人网&nbsp;&nbsp;<a href="http://mobile.renren.com/simulator?psf=40008" class="font-green">[立即访问]</a></td><td>额外加一次当日登录积分</td>
                            </tr>
                            <tr>
                                <td>手机客户端登录人人网&nbsp;&nbsp;<a href="http://mobile.renren.com/showClient?psf=41001" class="font-green">[立即下载]</a></td><td>额外加一次当日登录积分</td>
                            </tr>
                            <tr>
                                <td>通过人人连接从外部网站登录</td><td>等同登录人人网，获得相应登录积分</td>
                            </tr>
                            <tr>
                                <td>登录人人桌面&nbsp;&nbsp;<a href="http://im.renren.com/desktop/ver20/rrsetup.exe" class="font-green">[立即安装]</a></td><td>额外加一次当日登录积分</td>
                            </tr>
                            <tr>
                                <th>发表日志</th><td>每发表一篇日志 </td><td>+1分</td><td>每天上限+1分</td>
                            </tr>
                            <tr>
                                <th>上传照片</th><td>每上传一张照片 </td><td>+1分</td><td>每天上限+1分</td>
                            </tr>
                            <tr>
                                <th>发表状态</th><td>每发表一条状态 </td><td>+1分</td><td>每天上限+1分</td>
                            </tr>
                            <tr>
                                <th>个人主页留言</th><td>每到他人的个人主页留言一次 </td><td>+1分</td><td>每天上限+1分</td>
                            </tr>
                            <tr>
                                <th>回复他人内容</th><td>回复他人日志、相册、状态、留言</td><td>每回复10次+1分</td><td>每天上限+5分</td>
                            </tr>
                            <tr>
                                <th>内容被他人回复</th><td>自己的日志、相册、状态被他人回复</td><td>每回复10次+1分</td><td>每天上限+10分</td>
                            </tr>
                            <tr>
                                <th>分享站外内容</th><td>每分享一次站外内容</td><td>+1分</td><td>每天上限+1分</td>
                            </tr>
                            <tr>
                                <th>分享站内内容</th><td>每分享一次站内内容</td><td>每分享10次+1分</td><td>每天上限+5分</td>
                            </tr>
                            <tr>
                                <th>内容被他人分享</th><td>自己的日志、 相册、分享被他人分享</td><td>每分享10次+1分</td><td>每天上限+5分</td>
                            </tr>
                            <tr>
                                <th>人人网消费</th><td>购买礼物，获得相应价值的积分（使用礼券不计积分），开通VIP会员，获得相应价值的积分
                                </td><td>每消费1人人豆+1分</td><td>没有上限</td>
                            </tr>
                            <tr>
                                <th>举报奖励</th><td>当您收到管理员发的站内信时，说明您的举报已生效</td><td>有效举报+1分</td><td>每日上限+1分</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
                <div id="" class="section">
                    <h2>积分等级对应</h2>
                    <div id="" class="section-padding">
                        <table class="grade-class">
                            <tbody><tr>
                                <th width="100px">用户等级</th><th>所需积分</th><th width="100px">用户等级</th><th>所需积分</th><th width="100px">用户等级</th><th>所需积分</th>
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
                            </tbody></table>
                    </div>
                </div>
            </div></div>
    </div>
@endsection