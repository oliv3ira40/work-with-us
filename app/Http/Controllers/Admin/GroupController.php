<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Admin\CreatedPermission;
use App\Models\Admin\Permission;

use App\Http\Requests\Group\newGroup;
use App\Http\Requests\Group\updateGroup;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $groups = Group::all();

        return view('Admin.groups.list', compact('groups'));
    }

    public function new()
    {
        $created_permissions = CreatedPermission::orderBy('created_at', 'desc')->get();

        return view('Admin.groups.new', compact('created_permissions'));
    }
    public function save(newGroup $req)
    {
        $data = $req->all();

        $group = Group::create($data);
        $data['group_id'] = $group->id;

        foreach ($data['permissions'] as $key => $permission) {
            $data['created_permission_id'] = $permission;
            Permission::create($data);
        }

        session()->flash('notification', 'success:Grupo criado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.groups.new');
        } else
        {
            return redirect()->route('adm.groups.list');
        }
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $group_permissions = $group->Permission;
        $created_permissions = CreatedPermission::orderBy('created_at', 'desc')->get();

        $permissions = [];
    	foreach ($created_permissions as $created_permission) {
    		$created_permission['select'] = 0;

    		foreach ($group_permissions as $group_permission) {
                $group_permission = $group_permission->CreatedPermission;

    			if ($created_permission->route == $group_permission->route) {
    				$created_permission['select'] = 1;
    			}
    		}
            $permissions[] = $created_permission;
    	}

        return view('Admin.groups.edit', compact('group', 'permissions'));
    }
    public function update(updateGroup $req)
    {
        $data = $req->all();
        
        $group = Group::find($data['id']);
        $group->update($data);
        
        if (isset($data['permissions']))
        {
            Permission::where('group_id', $group->id)->delete();
            
            $data['group_id'] = $group->id;
            foreach ($data['permissions'] as $key => $permission) {
                $data['created_permission_id'] = $permission;
                Permission::create($data);
            }
        }

        session()->flash('notification', 'success:Grupo atualizado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.groups.edit', $group->id);
        } else
        {
            return redirect()->route('adm.groups.list');
        }
    }

    public function alert($id)
    {
        $group = Group::find($id);
        if (HelpAdmin::isAProtectedGroup($group))
        {
            session()->flash('notification', 'info:Este grupo não pode ser excluído');
            return redirect()->route('adm.groups.list');
        }
        
        $users = User::where('group_id', $id)->count();

        return view('admin.groups.alert', compact('group', 'users'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $group = Group::find($data['id']);
        if (HelpAdmin::isAProtectedGroup($group))
        {
            session()->flash('notification', 'info:Este grupo não pode ser excluído');
            return redirect()->route('adm.groups.list');
        }
        
        $public_group = Group::where('tag', 'public')->first();
        $users = User::where('group_id', $data['id'])
            ->withTrashed()
            ->update(['group_id' => $public_group->id]);

        $group->delete();

        session()->flash('notification', 'success:Grupo excluído!');
        return redirect()->route('adm.groups.list');
    }
}
