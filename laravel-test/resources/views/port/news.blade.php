<?php
header("Content-Type:text/html;charset=UTF-8");
date_default_timezone_set("PRC");
$showapi_appid = '35960';  //替换此值,在官网的"我的应用"中找到相关值
$showapi_secret = '49c63e2baa0b401597ebad52acd9b0d5';  //替换此值,在官网的"我的应用"中找到相关值
$paramArr = array(
    'showapi_appid'=> $showapi_appid
    //添加其他参数
);

//创建参数(包括签名的处理)
function createParam ($paramArr,$showapi_secret) {
    $paraStr = "";
    $signStr = "";
    ksort($paramArr);
    foreach ($paramArr as $key => $val) {
        if ($key != '' && $val != '') {
            $signStr .= $key.$val;
            $paraStr .= $key.'='.urlencode($val).'&';
        }
    }
    $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
    $sign = strtolower(md5($signStr));
    $paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
//    echo "排好序的参数:".$signStr."<br>\r\n";
    return $paraStr;
}

$param = createParam($paramArr,$showapi_secret);
$url = 'http://route.showapi.com/1071-1?'.$param;
//echo "请求的url:".$url."<br>\r\n";
$result = file_get_contents($url);
//echo "返回的json数据:<br>\r\n";
//print $result.'<br>\r\n';
$results = json_decode($result);

$new=$results->showapi_res_body->showapi_res_body;
foreach($new->list as $v)
    {
        echo "<div id='a'><p>".$v->title."</p><p>".$v->day."</p><p>".$v->long."</p></div><hr>";
    }
?>
