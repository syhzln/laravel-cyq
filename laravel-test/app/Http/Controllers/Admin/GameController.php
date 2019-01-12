<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    //显示管理游戏
    public function game()
    {
        $game = DB::table('games')->paginate(3);
        return view('admin.game',compact('game'));
    }
    //显示增加游戏界面
    public function addgame()
    {
        return view('admin.addgame');
    }

    //增加游戏
    public function doaddgame(Request $request)
    {
        $game = new Game();
        $game->name = $request->input('name');
        $game->path = $request->input('path');
        $request->hasFile('img');
        $imgname = md5(time()).'.jpg';
        $request->file('img')->move('img/admin',$imgname);
        $game->img = $imgname;
        $result = $game->save();
        if ($result){
            return redirect('admin/game');
        }else{
            return back();
        }
    }

    //删除游戏
    public function deletegame($id)
    {
        $game = Game::find($id);
        $imgname = $game->toArray();
        $imgname = $imgname['img'];
        $result = $game->delete();
        if ($result){
            unlink('img/admin/'.$imgname);
        }
        return redirect('admin/game');
    }

    //修改游戏信息界面
    public function updategame($id)
    {
        $game = Game::find($id);
        return view('admin.updategame',compact('game','id'));
    }

    //修改游戏
    public function doupdategame(Request $request ,$id)
    {
        $game = Game::find($id);
        $game->name = $request->input('name','');
        $game->path = $request->input('path','');
        $img = $game->toArray();
        $img = $img['img'];
        if ($request->hasFile('img')){
            $imgname = md5(time()).'.jpg';
            $request->file('img')->move('img/admin',$imgname);
            $game->img = $imgname;
            unlink('img/admin/'.$img);
        }
        $result = $game->save();
            if ($result){
                return redirect('admin/game');
            }

    }


}
