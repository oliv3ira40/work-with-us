<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\User;

class AvatarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function changeUserAvatar(Request $req)
    {
        $data = $req->all();
        User::where('id', $data['user_id'])->first()
            ->update($data);

        return redirect()->route('adm.users.edit', $data['user_id']);
    }
}
