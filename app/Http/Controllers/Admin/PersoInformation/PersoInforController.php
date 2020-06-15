<?php

namespace App\Http\Controllers\Admin\PersoInformation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Admin\PersoInformation\PersonalInformation;
use App\Models\Admin\PersoInformation\ContactInformation;
use App\Models\Admin\PersoInformation\PhoneForContact;
use App\Models\Admin\PersoInformation\Address;
use App\Models\Admin\PersoInformation\WageClaim;
use App\Models\Admin\PersoInformation\ProfessionalExperience;
use App\Models\Admin\PersoInformation\Education;
use App\Models\Admin\PersoInformation\AdditionalInformation;
use App\Models\Admin\PersoInformation\Curriculum;

use App\Models\Admin\PersoInformation\CurrencyAvailable;
use App\Models\Admin\PersoInformation\SchoolchildrenAvailable;
use App\Models\Admin\PersoInformation\TypeOfCourseAvailable;
use App\Models\Admin\PersoInformation\MeanOfPublicizingVagancy;

class PersoInforController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function new()
    {
        $data['user'] = \Auth::user();
        $data['currencies_availables'] = CurrencyAvailable::all();
        $data['schoolchildrens_availables'] = SchoolchildrenAvailable::all();
        $data['types_of_courses_availables'] = TypeOfCourseAvailable::all();
        $data['mean_of_publicizing_vagancy'] = MeanOfPublicizingVagancy::all();

        return view('Admin.perso_information.new', compact('data'));
    }
    public function save(Request $req)
    {
        $data = $req->all();
        $user = \Auth::user();
        $data['user'] = [];
        $bar = DIRECTORY_SEPARATOR;
        
        $user_folder_path = 'users'.$bar.$user->id;
        Storage::makeDirectory($user_folder_path);
        
        // dd($data);
        
        // PersonalInformation
            // Save profile picture
                $file_pp = $data['perso_information']['profile_picture'];
                $extension_pp = $file_pp->getClientOriginalExtension();
                $file_pp->storeAs($user_folder_path, 'profile_picture.'.$extension_pp);
                $data['perso_information']['path_profile_picture'] = $user_folder_path.$bar.'profile_picture.'.$extension_pp;
            
            $personal_information = PersonalInformation::create($data['perso_information']);
            $data['user'] += ['personal_information_id' => $personal_information->id];

        // ContactInformation
            $data['contact_information'] += ['personal_information_id' => $personal_information->id];
            $contact_information = ContactInformation::create($data['contact_information']);

        // PhoneForContact
            $phone_for_contact = ['contact_information_id' => $contact_information->id];
            foreach ($data['phones_for_contacts'] as $value) {
                $phone_for_contact['telephone'] = $value;
                PhoneForContact::create($phone_for_contact);
            }

        // Address
            $address = Address::create($data['address']);
            $data['perso_information']['address_id'] = $address->id;
        
        // WageClaim
            $data['wages_claims']['value'] = str_replace('.', '', $data['wages_claims']['value']);
            $data['wages_claims']['value'] = str_replace(',', '.', $data['wages_claims']['value']);
            $wage_claim = WageClaim::create($data['wages_claims']);
            $data['perso_information']['wage_claim_id'] = $wage_claim->id;

        // ProfessionalExperience
            $data['professionals_experiences']['personal_information_id'] = $personal_information->id;
            $professional_experience = ProfessionalExperience::create($data['professionals_experiences']);
        
        // Education
            $education = Education::Create($data['educations']);
            $data['perso_information']['education_id'] = $education->id;

        // AdditionalInformation
            // Save medical report
                $file_mr = $data['additionals_informations']['medical_report_path'];
                $extension_mr = $file_mr->getClientOriginalExtension();
                $file_mr->storeAs($user_folder_path, 'medical_report.'.$extension_mr);
                $data['additionals_informations']['medical_report_path'] = $user_folder_path.$bar.'medical_report.'.$extension_mr;
            
            $additional_information = AdditionalInformation::create($data['additionals_informations']);
            $data['perso_information']['additional_information_id'] = $additional_information->id;
        
        // Curriculum
            // Save curriculum
                $file_cr = $data['curriculum']['path'];
                $extension_cr = $file_cr->getClientOriginalExtension();
                $file_cr->storeAs($user_folder_path, 'curriculum.'.$extension_cr);
                $data['curriculum']['path'] = $user_folder_path.$bar.'curriculum.'.$extension_cr;

            $curriculum = Curriculum::create($data['curriculum']);
            $data['perso_information']['curriculum_id'] = $curriculum->id;

        $personal_information->update($data['perso_information']);
        $user->update($data['user']);

        return redirect()->route('adm.index');
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
