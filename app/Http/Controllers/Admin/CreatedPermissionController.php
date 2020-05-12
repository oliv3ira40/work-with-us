<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\CreatedPermission;
use App\Http\Requests\CreatedPermission\newPermission;
use App\Http\Requests\CreatedPermission\updatePermission;

class CreatedPermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $list_permissions = CreatedPermission::all();

        return view('Admin.created_permissions.list', compact('list_permissions'));
    }

    public function new()
    {
        return view('Admin.created_permissions.new');
    }
    public function save(newPermission $req)
    {
        $data = $req->all();

        foreach (explode('/', $data['textarea']) as $textarea) {
            $n = explode('=', $textarea);

            CreatedPermission::create([
                'name'=>$n[0],
                'route'=>$n[1]
            ]);
        }

        session()->flash('notification', 'success:Permissões criadas!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.created_permissions.new');
        } else
        {
            return redirect()->route('adm.created_permissions.list');
        }
    }

    public function edit($id)
    {
        $permission = CreatedPermission::find($id);
    
        return view('Admin.created_permissions.edit', compact('permission'));
    }
    public function update(updatePermission $req)
    {
        $data = $req->all();
        $permission = CreatedPermission::find($data['id']);

        $permission->update($data);

        session()->flash('notification', 'success:Permissão atualizada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.created_permissions.edit', $permission->id);
        } else
        {
            return redirect()->route('adm.created_permissions.list');
        }
    }

    public function alert($id)
    {
        $permission = CreatedPermission::find($id);

        return view('admin.created_permissions.alert', compact('permission'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        CreatedPermission::find($data['id'])->delete();

        session()->flash('notification', 'success:Permissão excluída!');
        return redirect()->route('adm.created_permissions.list');
    }
}