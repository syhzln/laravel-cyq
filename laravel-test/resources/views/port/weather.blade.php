<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <style>
        #con{width: 150px !important;height:770px;}
    </style>
</head>
<body id="con">
<div id="con"></div>
<script>
    $.getScript('http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js', function(_result) {
        if (remote_ip_info.ret == '1') {
            setTimeout(function () {
                $.ajax({
                    type: "GET",
                    url: "http://wthrcdn.etouch.cn/weather_mini?city=" + remote_ip_info.city,
                    data: "",
                    success: function (msg) {
                        console.log(msg);
                        $json=$.parseJSON(msg);
                        document.write('<b>'+$json.data.city+'</b><br>');
                        document.write('今天气温：'+$json.data.wendu+'℃<br>');
                        document.write('温馨提示：'+$json.data.ganmao+'<hr>');
                        for($i=0;$i<$json.data.forecast.length;$i++) {
                            document.write('日期：'+$json.data.forecast[$i].date+'<br>');
                            document.write('类型：'+$json.data.forecast[$i].type+'<br>');
                            document.write('气温：'+$json.data.forecast[$i].high+'/'+$json.data.forecast[$i].low+'<br>');
                            document.write('风向：'+$json.data.forecast[$i].fengxiang+'<br>');
                            document.write('风力：'+$json.data.forecast[$i].fengli+'<br><hr>');
                        }
                    }
                })
            }, 1000)

        }
    })
</script>
</body>
</html>