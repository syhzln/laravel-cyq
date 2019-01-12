@extends('model.homemodel')
@section('title','个人信息')
@section('mycss')
    <link href="{{asset('home/css/game.css')}}" rel="stylesheet">
@endsection

@section('main')
    <div class="game">
        <ul class="game_list">
            @foreach($game as $games)
            <li>
                <div class="gameimg"><a href="{{url('game/'.$games['path'])}}"><img src="{{asset('img/admin/'.$games['img'])}}" width="150px" height="105px"></a></div>
                <div class="gamename"><p><a href="{{url('game/'.$games['path'])}}">{{$games['name']}}</a></p></div>
            </li>
                @endforeach
        </ul>
    </div>
   
@endsection