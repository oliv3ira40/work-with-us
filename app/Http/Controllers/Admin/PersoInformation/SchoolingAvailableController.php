<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PersoInformation\SchoolingAvailable;

class SchoolingAvailableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $schoolings_availables = SchoolingAvailable::orderBy('created_at', 'desc')->get();

        return view('Admin.perso_information.schooling_available.list', compact('schoolings_availables'));
    }

    public function new()
    {
        return view('Admin.perso_information.schooling_available.new');
    }
    public function save(Request $req)
    {
        $data = $req->all();
        SchoolingAvailable::create($data);
        
        session()->flash('notification', 'success:Escolaridade registrada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.schoolings_availables.new');
        } else
        {
            return redirect()->route('adm.schoolings_availables.list');
        }
    }

    public function edit($id)
    {
        $schooling = SchoolingAvailable::find($id);

        return view('Admin.perso_information.schooling_available.edit', compact('schooling'));
    }
    public function update(Request $req)
    {
        $data = $req->all();
        $schooling = SchoolingAvailable::find($data['id']);
        $schooling->update($data);

        session()->flash('notification', 'success:Escolaridade atualizada!');
        if  (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.schoolings_availables.edit', $schooling->id);
        } else
        {
            return redirect()->route('adm.schoolings_availables.list');
        }
    }

    public function alert($id)
    {
        $schooling = SchoolingAvailable::find($id);
        
        return view('Admin.perso_information.schooling_available.alert', compact('schooling'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $schooling = SchoolingAvailable::find($data['id']);

        $schooling->delete();
        session()->flash('notification', 'success:Escolaridade excluída!');
        return redirect()->route('adm.schoolings_availables.list');
    }
}
