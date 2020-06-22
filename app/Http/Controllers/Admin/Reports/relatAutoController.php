<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class relatAutoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function insertFiles()
    {
        return view();
    }
    public function getInformationFromFiles(Request $req)
    {
        $data = $req->all();

        dd($data);
    }
}
