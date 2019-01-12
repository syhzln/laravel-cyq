<?php

namespace App\Http\Controllers\Admin;

use App\Model\Home\integrade;
use App\Model\Home\integradeDo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class IntergralController extends Controller
{
    //
    public function intergralList()
    {
        $integrade = integrade::paginate(5);
        $integrades=DB::table('integrade')->join('integradedo','integrade.id_e','integradedo.eid')->get();
//        dd($integrades);
        return view('admin.intergrallist',compact('integrades','integrade'));
    }

//    public function intergralAdd()
//    {
//
//    }

    public function intergralUpdate(Request $request, $intergral_id)
    {
        if ($request->isMethod('post')){
            $integrades = integrade::findOrFail($intergral_id);
            $id=integradeDo::where('eid',$intergral_id)->get()->toarray()[0]['id'];
            $integradedos = integradeDo::findOrFail($id);
            $a=$integrades -> update($request->all());
            $b=$integradedos -> update($request->all());
          if($a == false || $b == false)
          {
              return back()->withErrors('修改失败！');
          }
            return redirect('/admin/intergral-list')->withErrors('修改成功！');
        }
        $integrades=DB::table('integrade')->join('integradedo','integrade.id_e','integradedo.eid')->where('id_e',$intergral_id)->get()[0];
//        dd($integrades);
        return view('admin/intergralUpdate', compact('integrades'));
    }

    public function intergralDelete($intergral_id)
    {
        $id=integradeDo::where('eid',$intergral_id)->get()->toarray()[0]['id'];
        $integrade=integrade::destroy($intergral_id);
        $integradeDo=integradeDo::destroy($id);
        if($integrade == 0 || $integradeDo == 0){
            return back()->withErrors('积分删除失败');
        }
        return redirect('/admin/intergral-list')->withErrors('积分删除成功');

    }
}
