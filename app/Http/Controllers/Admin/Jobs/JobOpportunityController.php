<?php

namespace App\Http\Controllers\Admin\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Jobs\JobOpportunity;
use App\Models\Address\State;
use App\Models\Address\City;

class JobOpportunityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function list()
    {
        $jobs = JobOpportunity::orderBy('created_at', 'desc')->get();

        return view('Admin.jobs.list', compact('jobs'));
    }

    public function new()
    {
        $states = State::all();

        return view('Admin.jobs.new', compact('states'));
    }
    public function save(Request $req)
    {
        $data = $req->all();
        JobOpportunity::create($data);
        
        session()->flash('notification', 'success:Vaga registrada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.job_opportunities.new');
        } else
        {
            return redirect()->route('adm.job_opportunities.list');
        }
    }
    public function getCitiesByState(Request $req)
    {
        $data = $req->all();
        return City::where('state_id', $data['state_id'])->get();        
    }

    public function edit($id)
    {
        $job = JobOpportunity::find($id);
        $states = State::all();

        return view('Admin.jobs.edit', compact('job', 'states'));
    }
    public function update(Request $req)
    {
        $data = $req->all();
        $job = JobOpportunity::find($data['id']);
        $job->update($data);

        session()->flash('notification', 'success:Vaga atualizada!');
        if (isset($data['stay_on_page']) AND $data['stay_on_page'] == 'on')
        {
            return redirect()->route('adm.job_opportunities.edit', $job->id);
        } else
        {
            return redirect()->route('adm.job_opportunities.list');
        }
    }

    public function alert($id)
    {
        $job = JobOpportunity::find($id);
        
        return view('Admin.jobs.alert', compact('job'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();
        $job = JobOpportunity::find($data['id']);

        $job->delete();
        session()->flash('notification', 'success:Vaga excluída!');
        return redirect()->route('adm.job_opportunities.list');
    }

    public function detail($id)
    {
        $job = JobOpportunity::find($id);

        return view('Admin.jobs.detail', compact('job'));
    }
}
