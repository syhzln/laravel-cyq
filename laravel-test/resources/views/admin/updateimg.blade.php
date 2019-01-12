<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<form action="{{url('/updateimg/'.$id )}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="file" name="img"><br><br>
    <input type="submit" value="更改" class="btn btn-info">
</form>
</body>
</html>
