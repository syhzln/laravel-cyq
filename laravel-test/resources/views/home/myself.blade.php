@extends('model.homemodel');
@section('model_main_left')
    <div id="model_main_left">
        <div class="index_friends">
        <div class="index_onefriend">
            <!-- 头像 -->
            <div class="index_friendimg" >
                <img src="{{asset('home/img/default_icon.png')}}" width="50">
            </div>
            <!-- 谁什么时候发表什么 -->
            <div class="index_friendinfo">
                <div>
                    <div style="float: left">龙家大少</div>
                    <div style="float: right;">下箭头</div>
                </div>
                <div><br>向好友发布状态</div>
            </div>
        </div>
        <div class="index_friendstext">
            这是test
        </div>
        {{-- 判断图片大小 大于500或者高于多少应该就定死  小于就可以 --}}
        <div>
            <img src="">
        </div>
        {{-- 点赞分享 --}}
        <div class="index_friendssure">
            <a href="" class="btn btn-default">点赞</a>&nbsp; &nbsp;
            <a href="" class="btn btn-default">分享</a>
        </div>
        {{-- 评论区域 --}}
        <div class="index_friendscomment">
            <img src="{{asset('home/img/default_icon.png')}}" height="30" style="float: left;margin-bottom:10px;"><span style="line-height:30px;"> &nbsp;</span>
            <textarea class="index_friendstextarea  form-control" type="text"  data-var="@heading-color" placeholder="评论..." style="width: 415px;height:30px;"></textarea>
            <span class="index_friendshint">0/150字</span>
            <button class="index_friendssureinfo btn btn-success btn-sm" style="display: none;">评论</button>
        </div>
    </div>
    </div>
@endsection