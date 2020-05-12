<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\User\newUser;
use App\Http\Requests\User\updateUser;

use App\Models\Admin\User;
use App\Models\Admin\Avatar;
use App\Models\Admin\Group;

use Illuminate\Auth\Notifications\ResetPassword;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $developer_group = Group::where('tag', 'developer')->first();
        $users = User::select('id', 'first_name', 'last_name', 'email', 'created_at', 'deleted_at', 'group_id')
            ->orderBy('created_at', 'desc')->withTrashed()->get();

        return view('Admin.users.list', compact('users'));
    }

    public function new()
    {
        $groups = Group::orderBy('created_at', 'desc')->get();
        $developer_group = Group::where('tag', 'developer')->first();
        
        if (!HelpAdmin::IsUserDeveloper()) {
            $groups = $groups->where('id', '!=', $developer_group->id);
        }

        return view('Admin.users.new', compact('groups'));
    }
    public function save(newUser $req)
    {
        $data = $req->all();
        $data['password'] = bcrypt($data['password']);
        
        $user = User::create($data);
        HelpAdmin::generateUserSettings($user);

        session()->flash('notification', 'success:Usuário criado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.users.new');
        } else
        {
            return redirect()->route('adm.users.list');
        }
    }

    public function edit($id)
    {
        $developer_group = Group::where('tag', 'developer')->first();
        $auth_user = \Auth::User();
        
        $user = User::find($id);
        if ($user == null) 
        {
            session()->flash('notification', 'error:Este usuário não está mais disponível');
            return redirect()->route('adm.index');
        }
        
        HelpAdmin::generateUserSettings($user);

        if (HelpAdmin::IsUserDeveloper($user) AND
            !HelpAdmin::IsUserDeveloper()) {
            return redirect()->route('adm.withoutPermission');
        }

        if ($auth_user->id != $user->id
        AND !in_array('adm.users.edit_other_users', HelpAdmin::permissionsUser($auth_user)))
        {
            return redirect()->route('adm.withoutPermission');
        }

        $groups = Group::orderBy('created_at', 'desc')->get();
        if (!HelpAdmin::IsUserDeveloper())
        {
            $groups = $groups->where('id', '!=', $developer_group->id);
        }

        $avatars = Avatar::all();

        return view('Admin.users.edit', compact('user', 'groups', 'avatars'));
    }
    public function update(updateUser $req)
    {
        $data = $req->all();
        $user = User::find($data['id']);
        if ($data['password'] != null)
        {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        
        $user->update($data);
        
        session()->flash('notification', 'success:Usuário atualizado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.users.edit', $user->id);
        } else
        {
            if (in_array('adm.users.list', HelpAdmin::permissionsUser()))
            {
                return redirect()->route('adm.users.list');
            } else
            {
                return redirect()->route('adm.users.edit', $user->id);
            }
        }
    }

    public function alert($id)
    {
        $user = User::find($id);

        return view('Admin.users.alert', compact('user'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        User::find($data['id'])->delete();

        session()->flash('notification', 'success:Usuário excluído!');
        return redirect()->route('adm.users.list');
    }

    public function toRestore($id)
    {
        $user = User::where('id', $id)->withTrashed()->first();
        $user->restore();

        session()->flash('notification', 'success:Usuário restaurado!');
        return redirect()->route('adm.users.list');
    }

    public function definitiveExclusionAlert($id)
    {
        $user = User::onlyTrashed()->find($id);

        return view('Admin.users.definitive_exclusion_alert', compact('user'));
    }
    public function definitiveExclusion(Request $req)
    {
        $data = $req->all();
        User::onlyTrashed()->find($data['id'])->forceDelete();

        session()->flash('notification', 'success:Usuário excluído permanentemente!');
        return redirect()->route('adm.users.list');
    }
}
