<?php

namespace App\Http\Controllers\Admin;

use App\Model\home\CommentLikes;
use App\Model\Home\Praise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class PraiseController extends Controller
{
    //
    public function praiseList()
    {
        $links=DB::select('select rid,count(rid) as zan from commentlikes group by rid');
//        ->paginate(5)
       return view('admin.praiselist',compact('links','commentlikes'));
    }

    public function praiseShow(Request $request,$praise_id)
    {
//        $linkes = Praise::where('rid',$intergral_id)->paginate(1);
        $links = Praise::where('rid',$praise_id)->get();
//        dd($links);
        return view('admin.praiseshow',compact('links'));
    }

    public function praiseAdd(Request $request,$praise_id)
    {
        if ($request->isMethod('post')){
//            dd($request->all());
            $Praises = Praise::create($request->all());
//            dd($Praises);
            if(empty($Praises))
            {
                return back()->withErrors('点赞失败');
            }
            return redirect('/admin/praise-list')->withErrors('添加点赞成功');
        }
          return view('admin.praiseadd',compact('praise_id'));
    }

//    public function praiseUpdate()
//    {
//
//    }

    public function praiseDelete($praise_id)
    {
        $praisedele=Praise::destroy($praise_id);
        if($praisedele == 0){
            return back()->withErrors('删除失败！');
        }
        return redirect('/admin/praise-list')->withErrors('删除成功');
    }


}
