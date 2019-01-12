<?php

namespace App\Http\Controllers\Home\Gift;

use App\Model\Home\gift;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function gift(Request $request)
    {
        $ingift = gift::create($request->all());
        if(count($ingift) == 0)
        {
            return back()->withErrors('发送祝福失败');
        }
        return redirect('/home/index')->withErrors('发送祝福成功');
    }

}
