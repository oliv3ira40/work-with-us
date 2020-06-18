<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PersoInformation\TypeOfContractAvailable;

class TypeOfContAvailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $contracts_availables = TypeOfContractAvailable::orderBy('created_at', 'desc')->get();

        return view('Admin.perso_information.type_of_contract_available.list', compact('contracts_availables'));
    }

    public function new()
    {
        return view('Admin.perso_information.type_of_contract_available.new');
    }
    public function save(Request $req)
    {
        $data = $req->all();
        TypeOfContractAvailable::create($data);
        
        session()->flash('notification', 'success:Tipo de contrato registrado!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.type_of_cont_avail.new');
        } else
        {
            return redirect()->route('adm.type_of_cont_avail.list');
        }
    }

    public function edit($id)
    {
        $contract_available = TypeOfContractAvailable::find($id);

        return view('Admin.perso_information.type_of_contract_available.edit', compact('contract_available'));
    }
    public function update(Request $req)
    {
        $data = $req->all();
        $contract_available = TypeOfContractAvailable::find($data['id']);
        $contract_available->update($data);

        session()->flash('notification', 'success:Tipo de contrato atualizado!');
        if  (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.type_of_cont_avail.edit', $contract_available->id);
        } else
        {
            return redirect()->route('adm.type_of_cont_avail.list');
        }
    }

    public function alert($id)
    {
        $contract_available = TypeOfContractAvailable::find($id);
        
        return view('Admin.perso_information.type_of_contract_available.alert', compact('contract_available'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $contract_available = TypeOfContractAvailable::find($data['id']);

        $contract_available->delete();
        session()->flash('notification', 'success:Tipo de contrato excluído!');
        return redirect()->route('adm.type_of_cont_avail.list');
    }
}