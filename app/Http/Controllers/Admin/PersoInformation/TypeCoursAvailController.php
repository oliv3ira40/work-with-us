<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PersoInformation\TypeOfCourseAvailable;

class TypeCoursAvailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $types_courses = TypeOfCourseAvailable::orderBy('created_at', 'desc')->get();

        return view('Admin.perso_information.type_of_course_available.list', compact('types_courses'));
    }

    public function new()
    {
        return view('Admin.perso_information.type_of_course_available.new');
    }
    public function save(Request $req)
    {
        $data = $req->all();
        TypeOfCourseAvailable::create($data);
        
        session()->flash('notification', 'success:Curso registrado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.type_cours_avail.new');
        } else
        {
            return redirect()->route('adm.type_cours_avail.list');
        }
    }

    public function edit($id)
    {
        $type_course = TypeOfCourseAvailable::find($id);

        return view('Admin.perso_information.type_of_course_available.edit', compact('type_course'));
    }
    public function update(Request $req)
    {
        $data = $req->all();
        $type_course = TypeOfCourseAvailable::find($data['id']);
        $type_course->update($data);

        session()->flash('notification', 'success:Curso atualizado!');
        if  (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.type_cours_avail.edit', $type_course->id);
        } else
        {
            return redirect()->route('adm.type_cours_avail.list');
        }
    }

    public function alert($id)
    {
        $type_course = TypeOfCourseAvailable::find($id);
        
        return view('Admin.perso_information.type_of_course_available.alert', compact('type_course'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $type_course = TypeOfCourseAvailable::find($data['id']);

        $type_course->delete();
        session()->flash('notification', 'success:Curso excluído!');
        return redirect()->route('adm.type_cours_avail.list');
    }
}
