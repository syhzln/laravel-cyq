<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Friendlylink;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FriendlylinkController extends Controller
{
    //显示后台页面及数据
   public function showlink()
   {
       $result = DB::table('friendlylink')->paginate(3);
       return view('admin.showlink')->with('links',$result);
   }

   //删除链接
    public function deletelink($id)
    {
        $link = Friendlylink::find($id);
        $link->delete();
        return redirect('admin/showlink');
    }

    //显示添加链接的视图
    public function showaddlink()
    {
        return view('admin.addlink');
    }
    //添加链接
    public function addlink(Request $request)
    {
        $link = new Friendlylink();
        $link->name = $request->input('name');
        $link->link = $request->input('link');
        $result = $link->save();
        if ($result){
            return redirect('admin/showlink');
        }else{
            return back();
        }
    }
    //显示修改链接的视图
    public function showupdatelink($id)
    {
        $result = Friendlylink::find($id)->toArray();
        return view('admin.updatelink')->with('links',$result)->with('id',$id);
    }

    //修改链接
    public function updatelink(Request $request,$id)
    {
        $links = Friendlylink::find($id);
        $links->name = $request->input('name','');
        $links->link = $request->input('link','');
        $result = $links->save();
        if ($result){
            return redirect('admin/showlink');
        }else{
            return back();
        }
    }


}
