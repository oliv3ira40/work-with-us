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
        return view('Admin.reports.automated_reporting.insert_files');
    }
    public function getInformationFromFiles(Request $req)
    {
        $data = $req->all();

        // EXTRACT CONTENT FILES
        foreach ($data['files'] as $key => $file) {
            $start_string = strpos(file_get_contents($file), 'class="sectionTable"') - 7;
            $end_string = strrpos(file_get_contents($file), '</tbody></table></div>') + 22;

            $data['files'][$key] = [];
            $data['files'][$key]['name'] = $file->getClientOriginalName();
            $data['files'][$key]['content'] = substr(file_get_contents($file), $start_string, $end_string - $start_string);        
        }

        return view('Admin.reports.automated_reporting.files_read', compact('data'));
    }
    public function generateAutoReport(Request $req)
    {
        $data = $req->all();
        dd($data);
    }
}
