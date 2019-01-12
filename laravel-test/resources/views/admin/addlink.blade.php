@extends('model.adminmodel')
@section('amodel_main')
    <div style="width: 1247px;height: 611px">
        <div class="info-section">
            <div class="details-infoedit">
                <h4 id="educationInfo_display" class="legend">
                    <span>添加链接</span>
                </h4>
                <form action="{{url('/addlink')}}" method="post">
                    {{csrf_field()}}
                    名称: <input type="text" name="name" class="input-class" value=""><br><br>
                    链接: <input type="text" name="link" class="input-class" value=""><br><br>
                    <input type="submit" value="添加" class="btn btn-default">
                    <a href="{{url('admin/showlink')}}" class="btn btn-default">退出</a>
                </form>

            </div>
        </div>
    </div>
@endsection