@extends('model.adminmodel')
@section('amodel_main')
        <div class="info-section">
            <div class="details-infoedit">
                <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{asset('home/img/like.png')}}">
                            </span>
                    <span>喜欢</span>
                </h4>
                <form class="panel" action="{{url('admin/like/'.$uid )}}" method="post" name="personalInfoForm" id="personalInfo_form">
                    {{csrf_field()}}
                        <div class="music-info-edit">
                            <label for="music">
                                <span style="color: #888">音乐</span>
                            </label>
                            <textarea tabindex="1" rows="5" cols="80" class="textarea" id="music" name="music" style="color: rgb(136, 136, 136);">{{$like['music']}}</textarea>
                        </div>
                        <p>
                            <label for="book">
                                <span>书籍</span>
                            </label>
                            <textarea tabindex="3" rows="5" cols="80" class="textarea" id="book" name="book" style="color: rgb(136, 136, 136);">{{$like['book']}}</textarea>
                        </p>
                        <p>
                            <label for="movie">
                                <span>电影</span>
                            </label>
                            <textarea tabindex="4" rows="5" cols="80" class="textarea" id="movie" name="movie" style="color: rgb(136, 136, 136);">{{$like['movie']}}</textarea>
                        </p>
                        <p>
                            <label for="game">
                                <span>游戏</span>
                            </label>
                            <textarea tabindex="5" rows="5" cols="80" class="textarea" id="game" name="game" style="color: rgb(136, 136, 136);">{{$like['game']}}</textarea>
                        </p>

                        <input type="submit" value="保存" class="btn btn-default" >
                        <a href="{{url('admin/index')}}" class="btn btn-default">退出</a>

        </div>
        </form>
@endsection