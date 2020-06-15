<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        return view();
    }

    public function edit($id)
    {
        return view();
    }
    public function update(Request $req)
    {
        $data = $req->all();
        dd($data);
    }

    public function alert($id)
    {
        return view();
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        dd($data);
    }
}
