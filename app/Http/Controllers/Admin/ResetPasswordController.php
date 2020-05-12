<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\HelpAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Http\Requests\User\resetPassword;
use App\Models\Admin\User;

class ResetPasswordController extends Controller
{
    public function resetPassword()
    {
        return view('auth.passwords.reset');
    }

    public function sendNewPassword(resetPassword $req)
    {
        $data = $req->all();
        $user = User::where('email', $data['email'])->first();

        $data['full_name_user'] = HelpAdmin::completName($user);
        $data['new_password'] = Str::random(6);
        
        $user->update(['password' => bcrypt($data['new_password'])]);

        Mail::send('auth.emails_templates.new_password', $data, function($message) use ($data){
            $message->from('no-reply@startproject.com.br', 'StartProject');
            $message->to($data['email']);
            // $message->bcc('');
            $message->subject('StartProject - Senha resetada');
        });

        session()->flash('notification', 'success:Nova senha enviada para '.$user->email);
        return redirect()->route('login');
    }
}