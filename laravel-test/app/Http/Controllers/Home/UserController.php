<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Model\Admin\Friendlylink;
use App\Model\Admin\Lunbo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    //注册
    public function reg()
    {
        $links = Friendlylink::all()->toArray();
        return view('home.reg',compact('links'));
    }
    //保存用户信息
    public function store(UserRegisterRequest $request)
    {
//        dd($request->all());
        $confirmed_code = str_random(10);
        $data = [
            'avatar'=>'home/img/default.jpg',
            'confirmed_code' => $confirmed_code,
        ];
       $user = User::create(array_merge($request->all(),$data));
        $uid = $user->toArray();
        $uid = $uid['id'];
        $data2 = array(
            'uid'=> $uid
        );
        //        添加默认封面
        $cover = [
            'uid'=> $uid,
            'img'=>'cover_guide2.png',
        ];
       if($user){
           DB::table('cover')->insert($cover);
           DB::table('information')->insert($data2);
       }
       //发送邮件        用户  视图  邮件信息
        $view = 'home.emailConfirmed';
        $subject = '请验证邮箱';
        $this->sendEmail($user,$view,$subject,$data);
        return redirect('/');
    }
    public function sendEmail($user,$view,$subject,$data)
    {
        Mail::send($view, $data, function ($m) use ($subject,$user) {
            $m->to($user->email)->subject($subject);
        });
    }

    public function emailConfirm($code)
    {
        //dd($code);
        //查询与之匹配的这个用户
        $user = User::where('confirmed_code', $code)->first();
        //dd($user);
        if (is_null($user)) {
            return redirect('/');
        }
        $user->confirmed_code = str_random(10);
        $user->is_confirmed = 1;
        $user->save();
        return redirect('/');
    }

    //显示登录
    public function login()
    {

        $links = Friendlylink::all()->toArray();

        $img = Lunbo::all()->toArray();//前台轮播图片查询
        return view('home.login',compact('img','links'));
    }

    //处理登录
    public function singin(UserLoginRequest $request)
    {
        $pass = $request->password;
        $res = DB::table('users')->where('email', $request->email)->get();
        foreach ($res as $v) {
            $repass = $v->password;
            $confirm = $v->is_confirmed;
        }

        //判断邮箱是否存在
      if(count($res) == 0){
            return back()->withErrors('邮箱不存在!');
      };

        //验证邮箱是否验证成功
        if ($confirm == 0){
            return back()->withErrors('请验证邮箱!');
        }
        //dd(Hash::check($pass, $repass));
        if (Hash::check($pass, $repass)) {
            Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
            return redirect('home/index');
        }else{
            return back();
        }
    }

    //用户注销
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }



}
