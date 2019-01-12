@extends('model.adminmodel')
@section('amodel_main')
    <div class="info-section">
        <div class="details-infoedit">
            <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/work.png')}}">
                            </span>
                <span>工作信息</span>
            </h4>
        <form action="{{url('admin/work/'.$uid )}}" method="post">
            {{csrf_field()}}
        公司: <input type="text" name="company" class="input-class" value="{{$work['company']}}"><br><br>
        行业: <select name="indutry" id="indutry" class="input-class">
            <option value="0" {{($work['indutry'])=='0'?'selected':''}}>请选择行业</option>
            <option value="1" {{($work['indutry'])=='1'?'selected':''}}>高新技术</option>
            <option value="2" {{($work['indutry'])=='2'?'selected':''}}>人事招聘</option>
            <option value="3" {{($work['indutry'])=='3'?'selected':''}}>广告公关</option>
            <option value="4" {{($work['indutry'])=='4'?'selected':''}}>企业服务</option>
            <option value="5" {{($work['indutry'])=='5'?'selected':''}}>媒体</option>
            <option value="6" {{($work['indutry'])=='6'?'selected':''}}>文化艺术</option>
            <option value="7" {{($work['indutry'])=='7'?'selected':''}}>法律</option>
            <option value="8" {{($work['indutry'])=='8'?'selected':''}}>金融财务</option>
            <option value="9" {{($work['indutry'])=='9'?'selected':''}}>餐饮/旅游/娱乐/体育</option>
            <option value="10"{{($work['indutry'])=='10'?'selected':''}}>服务业</option>
            <option value="11"{{($work['indutry'])=='11'?'selected':''}}>教育/科研</option>
            <option value="12"{{($work['indutry'])=='12'?'selected':''}}>消费品</option>
            <option value="13"{{($work['indutry'])=='13'?'selected':''}}>房地产/建筑/装潢</option>
            <option value="14"{{($work['indutry'])=='14'?'selected':''}}>医疗保健</option>
            <option value="15"{{($work['indutry'])=='15'?'selected':''}}>运输物流</option>
            <option value="16"{{($work['indutry'])=='16'?'selected':''}}>制造加工业</option>
            <option value="17"{{($work['indutry'])=='17'?'selected':''}}>农林牧渔业</option>
            <option value="18"{{($work['indutry'])=='18'?'selected':''}}>政府及公共事业机构</option>
            <option value="19"{{($work['indutry'])=='19'?'selected':''}}>非盈利机构/协会/社团</option>
            <option value="99"{{($work['indutry'])=='99'?'selected':''}}>其他</option>
        </select><br><br>
        职位: <select name="position" id="position" class="input-class">
            <option value="0" {{($work['position'])=='0'?'selected':''}}>请选择职位</option>
            <option value="1" {{($work['position'])=='1'?'selected':''}}>销售</option>
            <option value="2" {{($work['position'])=='2'?'selected':''}}>市场/市场拓展/公关</option>
            <option value="3" {{($work['position'])=='3'?'selected':''}}>商务/采购/贸易</option>
            <option value="4" {{($work['position'])=='4'?'selected':''}}>计算机软、硬件/互联网/IT</option>
            <option value="5" {{($work['position'])=='5'?'selected':''}}>电子/半导体/仪表仪器</option>
            <option value="6" {{($work['position'])=='6'?'selected':''}}>通信技术</option>
            <option value="7" {{($work['position'])=='7'?'selected':''}}>客户服务/技术支持</option>
            <option value="8" {{($work['position'])=='8'?'selected':''}}>行政/后勤</option>
            <option value="9" {{($work['position'])=='9'?'selected':''}}>人力资源</option>
            <option value="10"{{($work['position'])=='10'?'selected':''}}>高级管理</option>
            <option value="11"{{($work['position'])=='11'?'selected':''}}>生产/加工/制造</option>
            <option value="12"{{($work['position'])=='12'?'selected':''}}>质控/安检</option>
            <option value="13"{{($work['position'])=='13'?'selected':''}}>工程机械</option>
            <option value="14"{{($work['position'])=='14'?'selected':''}}>技工</option>
            <option value="15"{{($work['position'])=='15'?'selected':''}}>财会/审计/统计</option>
            <option value="16"{{($work['position'])=='16'?'selected':''}}>金融/银行/保险/证券/投资</option>
            <option value="17"{{($work['position'])=='17'?'selected':''}}>建筑/房地产/装修/物业</option>
            <option value="18"{{($work['position'])=='18'?'selected':''}}>交通/仓储/物流</option>
            <option value="19"{{($work['position'])=='19'?'selected':''}}>普通劳动力/家政服务</option>
            <option value="20"{{($work['position'])=='20'?'selected':''}}>零售业</option>
            <option value="21"{{($work['position'])=='21'?'selected':''}}>教育/培训</option>
            <option value="22"{{($work['position'])=='22'?'selected':''}}>咨询/顾问</option>
            <option value="23"{{($work['position'])=='23'?'selected':''}}>学术/科研</option>
            <option value="24"{{($work['position'])=='24'?'selected':''}}>法律</option>
            <option value="25"{{($work['position'])=='25'?'selected':''}}>美术/设计/创意</option>
            <option value="26"{{($work['position'])=='26'?'selected':''}}>编辑/文案/传媒/影视/新闻</option>
            <option value="27"{{($work['position'])=='27'?'selected':''}}>酒店/餐饮/旅游/娱乐</option>
            <option value="28"{{($work['position'])=='28'?'selected':''}}>化工</option>
            <option value="29"{{($work['position'])=='29'?'selected':''}}>能源/矿产/地质勘查</option>
            <option value="30"{{($work['position'])=='30'?'selected':''}}>医疗/护理/保健/美容</option>
            <option value="31"{{($work['position'])=='31'?'selected':''}}>生物/制药/医疗器械</option>
            <option value="32"{{($work['position'])=='32'?'selected':''}}>翻译（口译与笔译）</option>
            <option value="33"{{($work['position'])=='33'?'selected':''}}>公务员</option>
            <option value="34"{{($work['position'])=='34'?'selected':''}}>环境科学/环保</option>
            <option value="35"{{($work['position'])=='35'?'selected':''}}>农/林/牧/渔业</option>
            <option value="36"{{($work['position'])=='36'?'selected':''}}>兼职/临时/培训生/储备干部</option>
            <option value="37"{{($work['position'])=='37'?'selected':''}}>在校学生</option>
            <option value="99"{{($work['position'])=='99'?'selected':''}}>其他</option>
        </select><br><br>
        <input type="submit" value="保存" class="btn btn-default">
            <a href="{{url('admin/index')}}" class="btn btn-default">退出</a>
        </div>
    </div>
@endsection