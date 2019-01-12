<?php

namespace App\Http\Controllers\Admin;

use App\Home\Friend;
use App\Model\Home\gift;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BirthController extends Controller
{
    //
    public function birthList()
    {
        $userbirthdays=User::paginate(5);
        $userbirth=User::all()->toarray();
//        dd($userbirth);
        return view('/admin/birthlist',compact('userbirth','userbirthdays'));
    }

    public function birthShow()
    {
            $ufriendBirth = DB::select("select id,name,avatar,birthday from users where date_format(birthday,'%m%d') between date_format(curdate()-interval 7 day,'%m%d') and
        date_format(curdate()+interval 7 day,'%m%d')  limit 0,7 ");
//                ->paginate(5);
//        dd($ufriendBirth);
        return view('/admin/birthshow',compact('ufriendBirth'));
    }

    public function giftShow(Request $request,$birth_id)
    {
        $giftlink=gift::paginate(5);
        $gifts=gift::where('uid',$birth_id)->get();
        $getgifts=gift::where('gid',$birth_id)->get();
//        dump($gifts);
//        dd($gifts->toarray());
        return view('/admin/giftshow',compact('gifts','giftlink','getgifts','birth_id'));
    }

    public function giftAdd(Request $request,$birth_id)
    {
        if ($request->isMethod('post')){
//          dd($request->all());
            $insertGift = gift::create($request->all());
            if(empty($insertGift))
            {
                return back()->withErrors('错误，请重新添加祝福');
            }
            return redirect('/admin/gift-show/'.$birth_id)->withErrors('成功送出一条祝福');
        }
//        dd($birth_id);
//        $adminid=Auth::user();
//        dd($adminid);
        return view('admin.giftadd',compact('birth_id','adminid'));
    }

    public function giftDelete($birth_id)
    {
        $giftdele=gift::destroy($birth_id);
//        dd($giftdele);
        if($giftdele == 0)
        {
            return back()->withErrors('删除失败！');
        }
        return back()->withErrors('删除成功~');
    }
}
