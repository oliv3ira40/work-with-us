<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Models\Admin\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkEmail(Request $req)
    {
        $data = $req->all();
        $user = User::where('email', $data['email'])->first();

        if($user != null) {
            return redirect()->route('adm.welcome_back', $user->id);
        } else {
            return redirect()->route('adm.new_candidate', $data['email']);
        }
    }

    public function welcomeBack($user_id)
    {
        $user = User::find($user_id);
        
        return view('auth.welcome_back', compact('user'));
    }

    public function newCandidate($email)
    {   
        return view('auth.register', compact('email'));
    }
    public function saveNewCandidate(Request $req)
    {
        dd('saveNewCandidate');
    }
}