<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PersoInformation\CurrencyAvailable;
use App\Models\Admin\PersoInformation\SchoolchildrenAvailable;
use App\Models\Admin\PersoInformation\TypeOfCourseAvailable;

class PersoInforController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function new()
    {
        // $data = [
        //     ['Presencial'],
        //     ['EAD - Educação a distância']
        // ];

        // foreach ($data as $key => $dt) {
        //     $n = [
        //         'name'=>$dt[0],
        //     ];

        //     TypeOfCourseAvailable::create($n);
        // }
        // dd(TypeOfCourseAvailable::all());






        $data['user'] = \Auth::user();
        $data['currencies_availables'] = CurrencyAvailable::all();
        $data['schoolchildrens_availables'] = SchoolchildrenAvailable::all();
        $data['types_of_courses_availables'] = TypeOfCourseAvailable::all();

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
