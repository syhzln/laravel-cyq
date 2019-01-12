<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Lunbo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LunboController extends Controller
{
    //显示图片信息
    public function showlunbo()
    {
        $result = DB::table('lunbo')->paginate(3);
        return view('admin.lunbo')->with('lunbo',$result);
    }
    //增加图片
    public function addimg(Request $request)
    {
            $num = Lunbo::all();
            if(count($num) < 5){
                $img = new Lunbo();
                $request->hasFile('img');
                $imgname = md5(time()).'.jpg';
                $request->file('img')->move('img/admin',$imgname);
                $img->img = $imgname;
                $result = $img->save();
                if ($result){
                    return redirect('admin/showlunbo');
                }
            }else{
               return redirect('admin/showlunbo');
            }

    }

    //删除轮播图
    public function deleteimg($id)
    {
        $img = Lunbo::find($id);
        $imgname = $img->toArray();
        $imgname = $imgname['img'];
        $result = $img->delete();
        if ($result){
            unlink('img/admin/'.$imgname);
        }
        return redirect('admin/showlunbo');
    }

    //显示更新轮播图界面
    public function showupdateimg($id)
    {
        return view('admin.updateimg')->with('id',$id);
    }
    //修改轮播图片
    public function updateimg(Request $request,$id)
    {
        $img = Lunbo::find($id);
        $reimg = $img->toArray();
        $reimg = $reimg['img'];
        if ($request->hasFile('img')){
            $imgname = md5(time()).'jpg';
            $request->file('img')->move('img/admin',$imgname);
            $img->img = $imgname;
            $result = $img->save();
            if ($result){
                unlink('img/admin/'.$reimg);
                return redirect('admin/showlunbo');
            }
        }
    }
}
