<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Helpers\HelpAdmin;
use App\Helpers\HelpMenuAdmin;

use App\Models\Admin\Avatar;
use App\Models\Admin\User;
use App\Models\Admin\Group;
use App\Models\Admin\CreatedPermission;

use App\Models\Admin\Jobs\JobOpportunity;

use App\Jobs\Admin\NotificationCalled;
use Carbon\Carbon;
use PhpParser\Node\Stmt\Foreach_;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function index()
    {
        

















        if (HelpAdmin::IsUserDeveloper())
        {
            $data['user'] = \Auth::user();
            $data['count_users'] = User::count();
            $data['count_groups'] = Group::count();
            $data['count_permissions'] = CreatedPermission::count();

            // $data['groups'] = Group::orderBy('created_at')->paginate(10, ['*'], 'groups_page');
            return view('Admin.index', compact('data'));

        } elseif (HelpAdmin::IsUserAdministrator())
        {
            return redirect()->route('adm.administrator.index');

        } elseif (HelpAdmin::IsUserCandidate())
        {
            if (\Auth::user()->PersonalInformation == null) {
                return redirect()->route('adm.personal_informations.new');
            } else {
                $data['jobs'] = JobOpportunity::orderBy('created_at', 'desc')->get();

                return view('Admin.candidate_index', compact('data'));
            }

        } else {
            return view('Admin.index');
        }
    }

    public function withoutPermission()
    {
        return view('Admin.without_permission');
    }
}