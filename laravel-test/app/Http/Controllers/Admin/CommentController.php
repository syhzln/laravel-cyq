<?php

namespace App\Http\Controllers\Admin;

use App\Model\Home\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function commentList()
    {
        $commentts = Comment::paginate(5);
        $comments=$commentts->toarray()['data'];
        return view('admin.commentlist',compact('comments','commentts'));
    }

    public function commentAdd(Request $request)
    {
//        当前用户的ID     auth::user()->id
        $result=DB::table('diarys')->get();
        if(count($result) > 0)
        foreach ($result as $v)
        {
           $tid[]=$v->id;
        }
//        dd($tid);
        if ($request->isMethod('post')){
            $comments=array_merge($request->all());
            if(!empty($comments)){
                $key='';
                $val='';
                foreach ($comments as $k => $v)
                {
                     if($k=='_token'){
                         continue;
                     }
                     $key .='`'.$k.'`,';
                     $val .='"'.$v.'",';
                }
                $r=DB::table('diarys')->where('id',$comments['tid'])->get()[0];
                $key .='`tuid`,`utime_c`';
                $val .= '"'.$r->uid.'","'.date('Y-m-d h:i:s',time()).'"';
                $commee=DB::insert("insert into comments({$key}) value({$val})");
                if($commee == 0)
                {
                    return back()->withErrors('添加评论失败！ ');
                }
                return redirect('admin/comment-list')->withErrors('添加评论成功');
            }
            return redirect('admin/comment-list');
        }

       return view('admin.commentadd',compact('tid'));
    }

    public function commentDelete($comment_id)
    {
        $comments=Comment::destroy($comment_id);
        if(count($comments) == 0){
            return back()->withErrors('评论删除失败');
        }
        return redirect('admin/comment-list')->withErrors('评论删除成功');
    }

    public function commentUpdate(Request $request, $comment_id)
    {
        if ($request->isMethod('post')){
            $comments = Comment::findOrFail($comment_id);
            $ment=$comments -> update($request->all());
            if($ment == false)
            {
                return back()->withErrors('评论更新失败');
            }
            return redirect('admin/comment-list')->withErrors('评论更新成功');
        }
        $comments = Comment::findOrFail($comment_id);
//        dd($comments->tid);
        return view('admin/commentUpdate', compact('comments'));
    }

}
