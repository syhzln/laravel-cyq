<?php

namespace App\Http\Controllers\Home\Comment;


use App\Model\Home\Comment;
use App\Model\home\CommentLikes;
use App\Model\Home\diary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    //
    public function add()
    {
        if(empty($_POST['1'])){
            return back();
        }
        $k='';
        $v='';
        foreach ($_POST as $key => $val)
        {
            if($key == 1){
                $key="content_c";
            }
            if($key == '_token'){
                continue;
            }
            $k .= '`'.$key.'`,';
            $v .='"'.$val.'",';
        }
        $k .= '`utime_c`';
        $v .='"'.date('y-m-d h:i:s',time()).'"';
        $result = DB::insert("insert into comments({$k}) value({$v})");
        if($result){
            return redirect('home/index');
        }else{
            return back();
        }
    }

    public function delete($id)
    {
        $cont=Comment::find($id);
        $cont->delete();
        return redirect('/home/index');
    }

    public function zan($cid)
    {
        $uid=Auth::user()->id;
       $data=array(
           'uid'=>$uid,
           'rid'=>$cid,
       );
       DB::table('commentlikes')->insert($data);
       $result=DB::table('commentlikes')->where('rid',$cid)->get();
       $summ=count($result);
       return $summ;

    }

    public function zan2($cid)
    {
        $uid=Auth::user()->id;
        $result=DB::table('commentlikes')->where('rid',$cid)->where('uid',$uid)->limit(1)->delete();
        $result=DB::table('commentlikes')->where('rid',$cid)->get();
        $summ=count($result);
        return $summ;
    }
}
