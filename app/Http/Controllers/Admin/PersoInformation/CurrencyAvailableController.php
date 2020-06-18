<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\PersoInformation\CurrencyAvailable;

class CurrencyAvailableController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $currency_availables = CurrencyAvailable::orderBy('created_at', 'desc')->get();

        return view('Admin.perso_information.currency_available.list', compact('currency_availables'));
    }

    public function new()
    {
        return view('Admin.perso_information.currency_available.new');
    }
    public function save(Request $req)
    {
        $data = $req->all();
        CurrencyAvailable::create($data);
        
        session()->flash('notification', 'success:Moeda registrada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.currency_available.new');
        } else
        {
            return redirect()->route('adm.currency_available.list');
        }
    }

    public function edit($id)
    {
        $currency = CurrencyAvailable::find($id);

        return view('Admin.perso_information.currency_available.edit', compact('currency'));
    }
    public function update(Request $req)
    {
        $data = $req->all();
        $currency = CurrencyAvailable::find($data['id']);
        $currency->update($data);

        session()->flash('notification', 'success:Moeda atualizada!');
        if  (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.currency_available.edit', $currency->id);
        } else
        {
            return redirect()->route('adm.currency_available.list');
        }
    }

    public function alert($id)
    {
        $currency = CurrencyAvailable::find($id);
        
        return view('Admin.perso_information.currency_available.alert', compact('currency'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $currency = CurrencyAvailable::find($data['id']);

        $currency->delete();
        session()->flash('notification', 'success:Moeda excluída!');
        return redirect()->route('adm.currency_available.list');
    }
}
