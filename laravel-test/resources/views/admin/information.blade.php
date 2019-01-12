@extends('model.adminmodel')

@section('amodel_main')
    <div class="info-section">
        <div class="details-infoedit">
            <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/basic.png')}}">
                            </span>
                <span>基本信息</span>
            </h4>
            <form action="{{url('admin/information/'.$id )}}" method="post"enctype="multipart/form-data">
                {{csrf_field()}}
                @if($users['avatar'] == 'Home/img/default.jpg')
                    <div><img src="{{asset($users['avatar'])}}" alt="" style="width:100px"></div><br><br>
                @else
                    <div><img src="{{asset('img/home/'.$users['avatar'])}}" alt="" style="width:100px"></div><br><br>
                @endif
                *姓名: <input type="text" name="username" class="input-class" value="{{$users['username']}}"><br><br>
                *性别: <input type="radio" name='sex' value=1 {{($users['sex'])=='1'?'checked':''}} checked> 男
                <input type="radio" name='sex' value=2 {{($users['sex'])=='2'?'checked':''}}> 女<br><br>
                *家乡:  <select name="prov" id="prov" class="select-class" ><option>{{$users['prov']}}</option></select>
                <select name="city" id="city" class="select-class" > <option>{{$users['city']}}</option></select>
                <select name="area" id="area" class="select-class" ><option>{{$users['area']}}</option></select>
                <select name="street" id="street" class="select-class" ><option>{{$users['street']}}</option></select>
                <br><br>
                *生日: <input class="birth" type="date" name='birthday' value="{{$users['birthday']}}"> <br><br>
                <input type="submit" value="保存" class="btn btn-default">
                <a href="{{url('admin/index')}}" class="btn btn-default">退出</a>
            </form>
        </div>
    </div>

    <script src="{{asset('public/js/jquery-1.8.3.min.js')}}"></script>
    <script>

        $(function(){



            //1、载入页面完成后即对php请求数据添加省一级列表项
            $.ajax({

                url: "{{url('/lamp')}}",
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
                    url: "{{url('/lamp')}}",
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
@endsection