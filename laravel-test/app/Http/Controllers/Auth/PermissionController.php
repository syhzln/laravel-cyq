<?php

namespace App\Http\Controllers\Auth;


use App\Http\Middleware\Rbac;
use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PermissionController extends Controller
{

    //显示权限列表
    public function privilege()
    {
        //查询所有的权限,分页显示
        $activitys = Permission::paginate(5);
        return view('admin/Privilege', compact('activitys'));
    }

    public function permissionadd(Request $request)
    {
        if ($request->isMethod('post')){
            //添加权限操作
//            dd($request->all());
            $permission = Permission::create($request->all());
            if(count($permission) == 0){
                return back()->withErrors('添加权限失败');
            };
            return redirect('admin/Privilege')->withErrors('添加权限成功');
        }
        return view('admin.profile');
    }

    public function permissionUpdate(Request $request, $permission_id)
    {
        //修改用户信息
        if($request->isMethod('post')){
            $alters = Permission::findOrFail($permission_id);
            $alert=$alters -> update($request->all());
            if($alert == false){
                return back()->withErrors('更新权限失败');
            }
            return redirect('admin/Privilege')->withErrors('更新权限成功');
        }
        //查询当前权限信息
        $alters = Permission::findOrFail($permission_id);
//        dd($alters->all()[0]->description);
        return view('admin/alter', compact('alters'));
    }

    public function permissionDelete($permission_id)
    {
        //删除信息
        $per=Permission::destroy([$permission_id]);
        if($per == 0){
            return back()->withErrors('删除失败');
        }
        return redirect('admin/Privilege')->withErrors('删除成功');
    }

}
