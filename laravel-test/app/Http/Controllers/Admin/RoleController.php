<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TraitUseAdaptation\Precedence;
use App\User;


class RoleController extends Controller
{
    //角色列表,分页显示
    public function roleList()
    {
        $roles = Role::paginate(5);

        foreach ($roles as $role){
            $perms = array();

            foreach ($role->perms as $perm){
                $perms[] = $perm->display_name;
            }
            $role->perms =implode(',', $perms);
        }
        return view('admin/rolelist', compact('roles'));
    }

    //新增角色
    public function roleAdd(Request $request)
    {

        if ($request->isMethod('post')){

            $inset = Role::create($request->all());
            if(count($inset) == 0)
            {
                return back()->withErrors('新增角色失败');
            }
            return redirect('admin/role-list')->withErrors('新增角色成功');
        }
        return view('admin.roleadd');
    }

    //修改
    public function roleUpdate(Request $request, $role_id)
    {
        if ($request->isMethod('post')){
            $role = Role::findOrFail($role_id);
            $roles=$role -> update($request->all());
            if($roles == false)
            {
                return back()->withErrors('角色更新失败');
            }
            return redirect('admin/role-list')->withErrors('角色更新成功');
        }
        //查询当前id数据
        $role = Role::findOrFail($role_id);
        return view('admin.roleupdate', compact('role'));
    }

    //删除
    public function roledelete($role_id)
    {
        $rid=DB::table('roles')
           ->where('id',$role_id)
           ->delete();
//        dd($role_id);
        if($rid == 0){
            return back()->withErrors('角色删除失败');
        }
        return redirect('admin/role-list')->withErrors('角色删除成功');
    }

    //分配权限
    public function assignment(Request $request, $role_id)
    {
        if ($request->isMethod('post')){
            //获取当前用户的角色
            $role = Role::find($role_id);
            DB::table('permission_role')->where('role_id', $role_id)->delete();
            if($request->input('permission_id')){
                foreach($request->input('permission_id') as $permission_id){
                    $role->attachPermission(Permission::find($permission_id));
                }
            }
            return redirect('admin/role-list')->withErrors('分配角色成功');
        }

        $permissions = Permission::all();

        return view('admin/assignment', compact('permissions','role_id'));
    }
}
