<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\UserSetting;

class UserSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function updateDarkMode(Request $req)
    {
        $data = $req->all();
        $user_setting = UserSetting::find($data['id']);

        if ($user_setting->dark_mode == 1)
        {
            $user_setting->update(['dark_mode'=>0]);
            session()->flash('notification', 'success:Modo escuro desativado!');
        } else
        {
            $user_setting->update(['dark_mode'=>1]);
            session()->flash('notification', 'success:Modo escuro ativado!');
        }

        // dd(url()->previous());
        if ($data['method'] == 'POST') {
            return redirect()->route('adm.index');
        } else {
            return redirect(url()->previous());
        }
    }

}
