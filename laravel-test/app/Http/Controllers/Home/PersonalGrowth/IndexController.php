<?php

namespace App\Http\Controllers\Home\PersonalGrowth;

use App\Model\Home\integrade;
use App\Model\Home\integradeDo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    //我的人品
    public function character()
    {
//       查找好友并遍历出rp_d name icon
        $uid=Auth::user()->id;
        $result=integrade::where('uid',$uid)->get()[0];
        $eid=$result->id_e;
        $resultt=integradedo::where('eid',$eid)->get()[0];
        $rpf=$resultt->rp_f;
        $rpz=$result->rp_z;
        $rpd=$result->rp_d;

//        三表联查user friends integrade
       return view('home.PersonalGrowth.myrp',compact('rpf','rpz','rpd'));
    }
//    日历
    public function calendar()
    {
       return view('home.PersonalGrowth.myCaledar');
    }
//    积分
    public function points()
    {
        return view('home.PersonalGrowth.myPoints');
    }
//    等级
    public function grade()
    {
        return view('home.PersonalGrowth.myGrade');
    }
//    介绍
    public function introduction()
    {
        return view('home.PersonalGrowth.myIntroduction');
    }

}
