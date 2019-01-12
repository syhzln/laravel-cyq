<?php

namespace App\Http\Controllers\Home\Intergral;

use App\Model\Home\integrade;
use App\Model\Home\integradeDo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //传参
    public function intergral()
    {

    }
    //timeD
    public function timeD()
    {
        $uid=Auth::user()->id;
        $result=integrade::where('uid',$uid)->get();
//        dd((($result)));
        if(count($result) == 0){
            $data=array(
                'uid'=>$uid,
                'rp_d'=>rand(1,6),
            );
            $eid=DB::table('integrade')->insertGetId($data);
            $jf=integradeDo::create([
                'eid'=>$eid,
                'time_d'=>date('Y/m/d',time()),
                'time_m'=>date('h:i:s',time()),
            ]);
        }else{
            $eid=$result[0]->id_e;
            $jf=integradeDo::where('eid',$eid)->get()[0];
            $t=strtotime(date('Y/m/d',time()))-strtotime($jf->time_d);
            if(abs($t) >= 86400) {
                $result[0]->rp_z += $result[0]->rp_d;
                $result[0]->rp_d = rand(1, 6);
                $result[0]->save();
                $jf->time_d=date('Y/m/d',time());
//                $jf->rp_f=0;
            }
//            dd($result[0]->rp_d);
            $sub=strtotime(date('h:i:s',time())) - strtotime($jf->time_m);

            if(abs($sub) > 1800)
            {
                $jf->rp_f += 1;
                $result[0]->rp_d += 1;
                $result[0]->save();
                $jf->time_m=date('h:i:s',time());
            }
                $resultt=$jf->save();
                if($resultt){
                    return redirect('/home/index');
                }else{
                    return back();
                }
        }
        return redirect('/home/index');
    }

}
