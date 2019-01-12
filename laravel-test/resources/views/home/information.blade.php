@extends('model.homemodel')
@section('title','个人信息')
@section('mycss')
    <link href="{{asset('home/css/information.css')}}" rel="stylesheet">
@endsection

@section('main')
    <div class="bd-main">
       <div class="bd-content">
            <div class="info-left">
                <div class="info-section">
                    <div class="details-infoedit">
                        <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/study.png')}}">
                            </span>
                            <span>学校信息</span>
                        </h4>

                        <form action="{{url('/doschoo')}}l" method="post">
                            {{csrf_field()}}
                            @if($information->isEmpty())
                            大学: <input type="text" name="school" class="input-class" value=""><br><br>
                            身份: <select name="identity" class="input-class">
                                <option value="0" >请选择类型</option>
                                <option value="1" >大学生</option>
                                <option value="2" >硕士</option>
                                <option value="3" >博士</option>
                                <option value="4" >教师</option>
                            </select><br><br>
                            院系: <input type="text" name="counts" class="input-class" value=""><br><br>
                            <input type="submit" value="保存" class="btn btn-default">

                        @else
                            @foreach($information as $school)
                            大学: <input type="text" name="school" class="input-class" value="{{$school->school}}"><br><br>
                            身份: <select name="identity" class="input-class">
                                        <option value="0" {{($school->identity)=='0'?'selected':''}}>请选择类型</option>
                                        <option value="1" {{($school->identity)=='1'?'selected':''}}>大学生</option>
                                        <option value="2" {{($school->identity)=='2'?'selected':''}}>硕士</option>
                                        <option value="3" {{($school->identity)=='3'?'selected':''}}>博士</option>
                                        <option value="4" {{($school->identity)=='4'?'selected':''}}>教师</option>
                                  </select><br><br>
                            院系: <input type="text" name="counts" class="input-class" value="{{$school->counts}}"><br><br>
                            <input type="submit" value="保存" class="btn btn-default">
                            @endforeach
                                @endif
                        </form>

                    </div>
                </div>

                <div class="info-section">
                    <div class="details-infoedit">
                        <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/work.png')}}">
                            </span>
                            <span>工作信息</span>
                        </h4>
                        <form action="{{url('/dowork')}}" method="post">
                            {{csrf_field()}}
                            @if($work->isEmpty())
                            公司: <input type="text" name="company" class="input-class"><br><br>
                            行业: <select name="indutry" id="indutry" class="input-class">
                                <option value="0">请选择行业</option>
                                <option value="1">高新技术</option>
                                <option value="2">人事招聘</option>
                                <option value="3">广告公关</option>
                                <option value="4">企业服务</option>
                                <option value="5">媒体</option>
                                <option value="6">文化艺术</option>
                                <option value="7">法律</option>
                                <option value="8">金融财务</option>
                                <option value="9">餐饮/旅游/娱乐/体育</option>
                                <option value="10">服务业</option>
                                <option value="11">教育/科研</option>
                                <option value="12">消费品</option>
                                <option value="13">房地产/建筑/装潢</option>
                                <option value="14">医疗保健</option>
                                <option value="15">运输物流</option>
                                <option value="16">制造加工业</option>
                                <option value="17">农林牧渔业</option>
                                <option value="18">政府及公共事业机构</option>
                                <option value="19">非盈利机构/协会/社团</option>
                                <option value="99">其他</option>
                            </select><br><br>
                            职位: <select name="position" id="position" class="input-class">
                                <option value="0">请选择职位</option>
                                <option value="1">销售</option>
                                <option value="2">市场/市场拓展/公关</option>
                                <option value="3">商务/采购/贸易</option>
                                <option value="4">计算机软、硬件/互联网/IT</option>
                                <option value="5">电子/半导体/仪表仪器</option>
                                <option value="6">通信技术</option>
                                <option value="7">客户服务/技术支持</option>
                                <option value="8">行政/后勤</option>
                                <option value="9">人力资源</option>
                                <option value="10">高级管理</option>
                                <option value="11">生产/加工/制造</option>
                                <option value="12">质控/安检</option>
                                <option value="13">工程机械</option>
                                <option value="14">技工</option>
                                <option value="15">财会/审计/统计</option>
                                <option value="16">金融/银行/保险/证券/投资</option>
                                <option value="17">建筑/房地产/装修/物业</option>
                                <option value="18">交通/仓储/物流</option>
                                <option value="19">普通劳动力/家政服务</option>
                                <option value="20">零售业</option>
                                <option value="21">教育/培训</option>
                                <option value="22">咨询/顾问</option>
                                <option value="23">学术/科研</option>
                                <option value="24">法律</option>
                                <option value="25">美术/设计/创意</option>
                                <option value="26">编辑/文案/传媒/影视/新闻</option>
                                <option value="27">酒店/餐饮/旅游/娱乐</option>
                                <option value="28">化工</option>
                                <option value="29">能源/矿产/地质勘查</option>
                                <option value="30">医疗/护理/保健/美容</option>
                                <option value="31">生物/制药/医疗器械</option>
                                <option value="32">翻译（口译与笔译）</option>
                                <option value="33">公务员</option>
                                <option value="34">环境科学/环保</option>
                                <option value="35">农/林/牧/渔业</option>
                                <option value="36">兼职/临时/培训生/储备干部</option>
                                <option value="37">在校学生</option>
                                <option value="99">其他</option>
                            </select><br><br>
                            <input type="submit" value="保存" class="btn btn-default">
                            @else
                                @foreach($work as $works)
                                公司: <input type="text" name="company" class="input-class" value="{{$works->company}}"><br><br>
                                行业: <select name="indutry" id="indutry" class="input-class">
                                    <option value="0" {{($works->indutry)=='0'?'selected':''}}>请选择行业</option>
                                    <option value="1" {{($works->indutry)=='1'?'selected':''}}>高新技术</option>
                                    <option value="2" {{($works->indutry)=='2'?'selected':''}}>人事招聘</option>
                                    <option value="3" {{($works->indutry)=='3'?'selected':''}}>广告公关</option>
                                    <option value="4" {{($works->indutry)=='4'?'selected':''}}>企业服务</option>
                                    <option value="5" {{($works->indutry)=='5'?'selected':''}}>媒体</option>
                                    <option value="6" {{($works->indutry)=='6'?'selected':''}}>文化艺术</option>
                                    <option value="7" {{($works->indutry)=='7'?'selected':''}}>法律</option>
                                    <option value="8" {{($works->indutry)=='8'?'selected':''}}>金融财务</option>
                                    <option value="9" {{($works->indutry)=='9'?'selected':''}}>餐饮/旅游/娱乐/体育</option>
                                    <option value="10"{{($works->indutry)=='10'?'selected':''}}>服务业</option>
                                    <option value="11"{{($works->indutry)=='11'?'selected':''}}>教育/科研</option>
                                    <option value="12"{{($works->indutry)=='12'?'selected':''}}>消费品</option>
                                    <option value="13"{{($works->indutry)=='13'?'selected':''}}>房地产/建筑/装潢</option>
                                    <option value="14"{{($works->indutry)=='14'?'selected':''}}>医疗保健</option>
                                    <option value="15"{{($works->indutry)=='15'?'selected':''}}>运输物流</option>
                                    <option value="16"{{($works->indutry)=='16'?'selected':''}}>制造加工业</option>
                                    <option value="17"{{($works->indutry)=='17'?'selected':''}}>农林牧渔业</option>
                                    <option value="18"{{($works->indutry)=='18'?'selected':''}}>政府及公共事业机构</option>
                                    <option value="19"{{($works->indutry)=='19'?'selected':''}}>非盈利机构/协会/社团</option>
                                    <option value="99"{{($works->indutry)=='99'?'selected':''}}>其他</option>
                                </select><br><br>
                                职位: <select name="position" id="position" class="input-class">
                                    <option value="0" {{($works->position)=='0'?'selected':''}}>请选择职位</option>
                                    <option value="1" {{($works->position)=='1'?'selected':''}}>销售</option>
                                    <option value="2" {{($works->position)=='2'?'selected':''}}>市场/市场拓展/公关</option>
                                    <option value="3" {{($works->position)=='3'?'selected':''}}>商务/采购/贸易</option>
                                    <option value="4" {{($works->position)=='4'?'selected':''}}>计算机软、硬件/互联网/IT</option>
                                    <option value="5" {{($works->position)=='5'?'selected':''}}>电子/半导体/仪表仪器</option>
                                    <option value="6" {{($works->position)=='6'?'selected':''}}>通信技术</option>
                                    <option value="7" {{($works->position)=='7'?'selected':''}}>客户服务/技术支持</option>
                                    <option value="8" {{($works->position)=='8'?'selected':''}}>行政/后勤</option>
                                    <option value="9" {{($works->position)=='9'?'selected':''}}>人力资源</option>
                                    <option value="10"{{($works->position)=='10'?'selected':''}}>高级管理</option>
                                    <option value="11"{{($works->position)=='11'?'selected':''}}>生产/加工/制造</option>
                                    <option value="12"{{($works->position)=='12'?'selected':''}}>质控/安检</option>
                                    <option value="13"{{($works->position)=='13'?'selected':''}}>工程机械</option>
                                    <option value="14"{{($works->position)=='14'?'selected':''}}>技工</option>
                                    <option value="15"{{($works->position)=='15'?'selected':''}}>财会/审计/统计</option>
                                    <option value="16"{{($works->position)=='16'?'selected':''}}>金融/银行/保险/证券/投资</option>
                                    <option value="17"{{($works->position)=='17'?'selected':''}}>建筑/房地产/装修/物业</option>
                                    <option value="18"{{($works->position)=='18'?'selected':''}}>交通/仓储/物流</option>
                                    <option value="19"{{($works->position)=='19'?'selected':''}}>普通劳动力/家政服务</option>
                                    <option value="20"{{($works->position)=='20'?'selected':''}}>零售业</option>
                                    <option value="21"{{($works->position)=='21'?'selected':''}}>教育/培训</option>
                                    <option value="22"{{($works->position)=='22'?'selected':''}}>咨询/顾问</option>
                                    <option value="23"{{($works->position)=='23'?'selected':''}}>学术/科研</option>
                                    <option value="24"{{($works->position)=='24'?'selected':''}}>法律</option>
                                    <option value="25"{{($works->position)=='25'?'selected':''}}>美术/设计/创意</option>
                                    <option value="26"{{($works->position)=='26'?'selected':''}}>编辑/文案/传媒/影视/新闻</option>
                                    <option value="27"{{($works->position)=='27'?'selected':''}}>酒店/餐饮/旅游/娱乐</option>
                                    <option value="28"{{($works->position)=='28'?'selected':''}}>化工</option>
                                    <option value="29"{{($works->position)=='29'?'selected':''}}>能源/矿产/地质勘查</option>
                                    <option value="30"{{($works->position)=='30'?'selected':''}}>医疗/护理/保健/美容</option>
                                    <option value="31"{{($works->position)=='31'?'selected':''}}>生物/制药/医疗器械</option>
                                    <option value="32"{{($works->position)=='32'?'selected':''}}>翻译（口译与笔译）</option>
                                    <option value="33"{{($works->position)=='33'?'selected':''}}>公务员</option>
                                    <option value="34"{{($works->position)=='34'?'selected':''}}>环境科学/环保</option>
                                    <option value="35"{{($works->position)=='35'?'selected':''}}>农/林/牧/渔业</option>
                                    <option value="36"{{($works->position)=='36'?'selected':''}}>兼职/临时/培训生/储备干部</option>
                                    <option value="37"{{($works->position)=='37'?'selected':''}}>在校学生</option>
                                    <option value="99"{{($works->position)=='99'?'selected':''}}>其他</option>
                                </select><br><br>
                                <input type="submit" value="保存" class="btn btn-default">
                                @endforeach
                            @endif
                        </form>
                    </div>
                </div>

                <div class="info-section">
                    <div class="details-infoedit">
                        <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/like.png')}}">
                            </span>
                            <span>喜欢</span>
                        </h4>
                        <form class="panel" action="{{url('/dolike')}}" method="post" name="personalInfoForm" id="personalInfo_form">
                            {{csrf_field()}}
                            @if($like->isEmpty())
                            <div class="music-info-edit">
                                <label for="music">
                                    <span style="color: #888">音乐</span>
                                </label>
                                <textarea tabindex="1" rows="5" cols="80" class="textarea" id="music" name="music" style="color: rgb(136, 136, 136);"></textarea>
                            </div>
                            <p>
                                <label for="book">
                                    <span>书籍</span>
                                </label>
                                <textarea tabindex="3" rows="5" cols="80" class="textarea" id="book" name="book" style="color: rgb(136, 136, 136);"></textarea>
                            </p>
                            <p>
                                <label for="movie">
                                    <span>电影</span>
                                </label>
                                <textarea tabindex="4" rows="5" cols="80" class="textarea" id="movie" name="movie" style="color: rgb(136, 136, 136);"></textarea>
                            </p>
                            <p>
                                <label for="game">
                                    <span>游戏</span>
                                </label>
                                <textarea tabindex="5" rows="5" cols="80" class="textarea" id="game" name="game" style="color: rgb(136, 136, 136);"></textarea>
                            </p>

                                <input type="submit" value="保存" class="btn btn-default" >
                            @else
                                @foreach($like as $likes)
                                <div class="music-info-edit">
                                    <label for="music">
                                        <span style="color: #888">音乐</span>
                                    </label>
                                    <textarea tabindex="1" rows="5" cols="80" class="textarea" id="music" name="music" style="color: rgb(136, 136, 136);">{{$likes->music}}</textarea>
                                </div>
                                <p>
                                    <label for="book">
                                        <span>书籍</span>
                                    </label>
                                    <textarea tabindex="3" rows="5" cols="80" class="textarea" id="book" name="book" style="color: rgb(136, 136, 136);">{{$likes->book}}</textarea>
                                </p>
                                <p>
                                    <label for="movie">
                                        <span>电影</span>
                                    </label>
                                    <textarea tabindex="4" rows="5" cols="80" class="textarea" id="movie" name="movie" style="color: rgb(136, 136, 136);">{{$likes->movie}}</textarea>
                                </p>
                                <p>
                                    <label for="game">
                                        <span>游戏</span>
                                    </label>
                                    <textarea tabindex="5" rows="5" cols="80" class="textarea" id="game" name="game" style="color: rgb(136, 136, 136);">{{$likes->game}}</textarea>
                                </p>

                                <input type="submit" value="保存" class="btn btn-default" >
                                @endforeach
                        @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           <div class="info-right">
               <div class="info-section">
                   <div class="details-infoedit">
                       <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/basic.png')}}">
                            </span>
                           <span>基本信息</span>
                       </h4>
                       <form action="{{url('/doinformation')}}" method="post"enctype="multipart/form-data">
                           {{csrf_field()}}
                           @if($user->avatar == 'Home/img/default.jpg')
                           <div><img src="{{asset($user->avatar)}}" alt="" style="width:100px"></div><br><br>
                           @else
                               <div><img src="{{asset('img/home/'.$user->avatar)}}" alt="" style="width:100px"></div><br><br>
                           @endif
                           *姓名: <input type="text" name="username" class="input-class" value="{{$user->username}}"><br><br>
                           *性别: <input type="radio" name='sex' value=1 {{($user->sex)=='1'?'checked':''}} checked> 男
                                 <input type="radio" name='sex' value=2 {{($user->sex)=='2'?'checked':''}}> 女<br><br>
                           *家乡:  <select name="prov" id="prov" class="select-class" ><option>{{$user->prov}}</option></select>
                           <select name="city" id="city" class="select-class" > <option>{{$user->city}}</option></select>
                           <select name="area" id="area" class="select-class" ><option>{{$user->area}}</option></select>
                           <select name="street" id="street" class="select-class" ><option>{{$user->street}}</option></select>
                           <br><br>
                           *生日: <input class="birth" type="date" name='birthday' value="{{$user->birthday}}"> <br><br>
                           <input type="file" name="pic"><br><br>
                           <input type="submit" value="保存" class="btn btn-default">
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>

    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>

        $(function(){



    //1、载入页面完成后即对php请求数据添加省一级列表项
    $.ajax({

        url:'{{url('/lamp')}}' ,
        data: 'upid=0',
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                $('#prov').append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
            }
            ;
        },
        error: function () {
            alert('失败1！');
        },
        dataType: 'json',
        //同步，如果没有第一级的数据第二级触发时自动为0
        async: false
    });

    //2、当前三级出现change事件时触发ajax获取value当作upid寻找下一级数据
    $('#prov,#city,#area').change(function () {
        var $upid = $(this).val();
        //在外层用变量存储$(this);
        var $_this = $(this);
//                alert($(this).next('select').attr('name'));
        //根据传入的upid为下一级select添加选项
        $.ajax({
            url: '{{url('/lamp')}}',
            data: 'upid=' + $upid,
            success: function (data) {
                //判断数据是否存在，如果没有隐藏下几级
                if (!data) {
                    $_this.nextAll('select').hide();
                    return;
                }
                //在添加新数据之前清空select
                $_this.next('select').empty().show();

                for (var i = 0; i < data.length; i++) {
                    $_this.next('select').append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
                }
                ;
                //添加完为下一级选中一下
                $_this.next('select').trigger('change');
            },
            error: function () {
                alert('失2败！');
            },
            dataType: 'json'
        });
    });

//    $('#prov').trigger('change');
        })
    </script>
    <style>
        select{
        //width:50px;
        }
    </style>
@endsection