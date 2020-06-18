<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PersoInformation\MeanOfPublicizingVagancy;

class MeanOfPublVagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $means_vagancies = MeanOfPublicizingVagancy::orderBy('created_at', 'desc')->get();

        return view('Admin.perso_information.mean_of_publicizing_vagancy.list', compact('means_vagancies'));
    }

    public function new()
    {
        return view('Admin.perso_information.mean_of_publicizing_vagancy.new');
    }
    public function save(Request $req)
    {
        $data = $req->all();
        MeanOfPublicizingVagancy::create($data);
        
        session()->flash('notification', 'success:Meio de divulgação registrado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.mean_of_publ_vag.new');
        } else
        {
            return redirect()->route('adm.mean_of_publ_vag.list');
        }
    }

    public function edit($id)
    {
        $mean_vagancy = MeanOfPublicizingVagancy::find($id);

        return view('Admin.perso_information.mean_of_publicizing_vagancy.edit', compact('mean_vagancy'));
    }
    public function update(Request $req)
    {
        $data = $req->all();
        $mean_vagancy = MeanOfPublicizingVagancy::find($data['id']);
        $mean_vagancy->update($data);

        session()->flash('notification', 'success:Meio de divulgação atualizado!');
        if  (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.mean_of_publ_vag.edit', $mean_vagancy->id);
        } else
        {
            return redirect()->route('adm.mean_of_publ_vag.list');
        }
    }

    public function alert($id)
    {
        $mean_vagancy = MeanOfPublicizingVagancy::find($id);
        
        return view('Admin.perso_information.mean_of_publicizing_vagancy.alert', compact('mean_vagancy'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $mean_vagancy = MeanOfPublicizingVagancy::find($data['id']);

        $mean_vagancy->delete();
        session()->flash('notification', 'success:Meio de divulgação excluído!');
        return redirect()->route('adm.mean_of_publ_vag.list');
    }
}
