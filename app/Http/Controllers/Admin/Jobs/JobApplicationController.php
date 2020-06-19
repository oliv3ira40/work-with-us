<?php

namespace App\Http\Controllers\Admin\Jobs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Jobs\JobOpportunity;

class JobApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public static function confirmation($job_id)
    {
        $job = JobOpportunity::find($job_id);
        dd($job);
    }
    public static function saveConfirmation($job_id)
    {
        $job = JobOpportunity::find($job_id);
        dd($job);
    }
}