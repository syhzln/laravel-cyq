<?php

namespace App\Http\Controllers\Admin;


use App\AdminUser;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Contracts\Auth\Authenticatable;


class UserController extends Controller
{
    //用户列表
    public function userList()
    {

        $users = AdminUser::paginate(5);
        foreach ($users as $user) {
            $roles = array();
//            dd($user->perms);

            foreach ($user->roles as $role) {

                $roles[] = $role->display_name;
//                dump($perm->display_name);
            }
            $user->roles = implode(',', $roles);
//            dd($users[0]->roles);
        }
        return view('admin/userlist', compact('users'));

    }

    //新增用户
    public function useradd(Request $request)
    {
        $confirmed_code = str_random('10');
        $r=$request->all();

        if ($request->isMethod('post')){
            $user=$r['name'];
            $email=$r['email'];
            $r=AdminUser::where('email',$email)->get()->toArray();
//            dd($r);
            if($r!=[]){
                return back()->withErrors('邮箱已经存在');
            }
            $r=AdminUser::where('name',$user)->get()->toArray();
//            dd($r);
            if($r!=[]){
                return back()->withErrors('用户名已经存在');
            }
            $uu=AdminUser::create(array_merge($request->all()));
            if(count($uu) == 0){
                return back()->withErrors('新增用户失败');
            }
            return redirect('admin/user-list')->withErrors('新增用户成功');
        }
        return view('admin/useradd');
    }

    //修改
    public function userupdate(Request $request, $user_id)
    {
//        Role::
        if ($request->isMethod('post')){
            $user = AdminUser::findOrFail($user_id);
            $uer=$user -> update($request->all());
            if($uer == false){
                return back()->withErrors('更新用户失败');
            }
            return redirect('admin/user-list')->withErrors('更新用户成功');
        }
//        查询当前id数据
        $user = AdminUser::findOrFail($user_id);
        return view('admin/userupdate', compact('user'));
    }

    public function userdelete($user_id)
    {
        $uuid=AdminUser::destroy($user_id);
        if($uuid == 0){
            return back()->withErrors('删除用户失败');
        }
        return redirect('admin/user-list')->withErrors('删除用户成功');
    }
    //分配用户
    public function allotrole(Request $request, $user_id)
    {
        if ($request->isMethod('post')){
            //获取当前用户的角色

            $user = AdminUser::find($user_id);
//dd($request->input('permission_id'));
            $all=DB::table('role_user')->where('user_id', $user_id)->delete();
            if($request->input('role_id')) {
                foreach ($request->input('role_id') as $role_id) {
                    $user->attachRole(Role::find($role_id));
                }
            }
            return redirect('admin/user-list')->withErrors('分配角色成功');
        }
         $roles = Role::all();

        return view('admin/allotrole', compact('roles','user_id'));
    }

    public  function dologin(Request $request)
    {
        $r=$request->all();
        $password=$r['password'];
        $name=$r['name'];
        $r1=AdminUser::where('name',$name)->get()->toArray();
        $r2=AdminUser::where('email',$name)->get()->toArray();
        $pass='';
        if($r1==[]){
            if($r2==[]){
                return redirect('admin/login')->withErrors('用户或者邮箱不存在');
            }else{
                $pass=$r2[0]['password'];
                $id=$r2[0]['id'];
            }
            return redirect('admin/login')->withErrors('用户或者邮箱不存在');
        }else{
            $pass=$r1[0]['password'];
            $id=$r1[0]['id'];
        }
        if($pass==''){
            return redirect('admin/login')->withErrors('用户或者邮箱不存在');
        }
        if(Hash::check($password,$pass)){
            session(['a'=>$id,'b'=>$name]);
            return redirect('admin/index');
        }else{
            return redirect('admin/login')->withErrors('登入失败稍后再试');
        }
    }


    //后台退出
    public function logout()
    {
        session()->flush();
        return redirect('admin/login');
    }


}
