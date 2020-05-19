<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersoInforController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function new()
    {
        $data['user'] = \Auth::user();
        return view('Admin.perso_information.new', compact('data'));
    }
    public function save(Request $req)
    {
        $data = $req->all();
        dd($data);
    }

    public function edit()
    {
        dd('asd');
    }
    public function update(Request $req)
    {
        $data = $req->all();
        dd('asd');
    }
}
