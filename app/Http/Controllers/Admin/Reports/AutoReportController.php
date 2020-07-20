<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\HelpAdmin;
use App\Helpers\HelpAutoReport;

use App\Http\Requests\Reports\AutoReport\getInforFromFiles;
use App\Http\Requests\Reports\AutoReport\genAutoReport;

use App\Models\Admin\User;

use App\Models\Admin\AutoReports\TopicItem;
use App\Models\Admin\AutoReports\SubtopicItem;
use App\Models\Admin\AutoReports\StatusSubtopic;
use App\Models\Admin\AutoReports\standardColumnAutoReport;

use App\Models\Admin\Reports\AdditionalParagraphsForReports;
use App\Models\Admin\Reports\AutoReport;

use Illuminate\Support\Facades\Storage;

class AutoReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function insertFiles()
    {
        $data['standard_column_auto_report'] = standardColumnAutoReport::first();

        return view('Admin.reports.automated_reporting.insert_files', compact('data'));
    }
    public function getInformationFromFiles(getInforFromFiles $req)
    {
        $data = $req->all();

        $data['standard_column_auto_report'] = HelpAutoReport::createOrUpdateStandColAutoReport($data);
        $data['additional_paragraphs'] = AdditionalParagraphsForReports::all();

        // EXTRACT CONTENT FILES
        foreach ($data['files'] as $key => $file) {
            $start_string = strpos(file_get_contents($file), 'class="hostnameTeal"') - 8;
            $end_string = strrpos(file_get_contents($file), '</tbody></table></div>') + 22;

            $data['files'][$key] = [];
            $data['files'][$key]['name'] = $file->getClientOriginalName();
            $data['files'][$key]['content'] = substr(file_get_contents($file), $start_string, $end_string - $start_string);        
        }

        return view('Admin.reports.automated_reporting.files_read', compact('data'));
    }
    public function generateAutoReport(Request $req)
    {
        set_time_limit(1000000);
        $data = $req->all();
        $bar = DIRECTORY_SEPARATOR;
        $auth_user = \Auth::user();
        $data['standard_column_auto_report'] = HelpAutoReport::createOrUpdateStandColAutoReport($data);

        $img_top = public_path().$bar.'imgs_reports/top.png';
        $img_footer = public_path().$bar.'imgs_reports/footer.png';
        $img_back_ground = public_path().$bar.'imgs_reports/back-ground.png';
        $img_full_back_ground = public_path().$bar.'imgs_reports/full-back-ground.png';

        $content_additional_paragraphs = '';
        AdditionalParagraphsForReports::getQuery()->delete();
        if (isset($data['additional_paragraphs'])) {
            foreach ($data['additional_paragraphs'] as $key => $additional_paragraph) {
                AdditionalParagraphsForReports::create($additional_paragraph);
                
                $content_additional_paragraphs .= '
                    <div>
                        <p class="mt-0 mb-0">
                            <b>'.$additional_paragraph['title'].'</b>
                        </p>
    
                        <p class="text-align">'.$additional_paragraph['description'].'</p>
                    </div>
                ';
            }
        }

        $content_topics_errors = '';
        foreach ($data['topics_errors'] as $topic => $description) {
            $content_topics_errors .= '
                <div>
                    <p class="mt-0 mb-0">
                        <b>'.$topic.'</b>
                    </p>

                    <p class="text-align">'.$description.'</p>
                </div>
            ';
        }

        $content_subtopics_errors = '';
        foreach ($data['subtopics_errors'] as $equipment => $topics) {

            $topics_html = '';
            foreach ($topics as $name_topic => $subtopics) {

                $subtopics_html = '';
                foreach ($subtopics as $name_subtopic => $responses) {
                    $name_subtopic = str_replace(' - ', '', $name_subtopic);

                    
                    $subtopic_error_description = '';
                    if (isset($responses[1])) {
                        foreach ($responses[1] as $key => $text) {
                            $subtopic_error_description .= '
                                <p class="mt-0 m-b-5 font-12 text-align">'.$text.'</p>
                            ';
                        }
                    }

                    $subtopics_html .= '
                        <p class="mt-0 mb-0 text-bold font-12">
                            '.$name_subtopic.' - <span class="text-'.str_slug($responses[0]).'">'.$responses[0].'</span>
                        </p>

                        '.$subtopic_error_description.'
                    ';
                }

                $topics_html .= '
                    <div class="m-t-10">
                        <p class="mt-0 mb-0 text-primary">'.$name_topic.'</p>

                        <div class="m-t-5">
                            '.$subtopics_html.'
                        </div>
                    </div>
                ';
            }

            $content_subtopics_errors .= '
                <div class="m-t-10">
                    <p class="mt-0 mb-0">
                        <b>'.$equipment.'</b>
                    </p>

                    '.$topics_html.'
                </div>
            ';
        }

        $html = '
            <style>
                body {
                    font-family: Roboto, "Segoe UI", Tahoma, sans-serif;
                    background: url('.$img_back_ground.') no-repeat 0 0;
                    background-image-resize: 6;
                }
                .count_pages { 
                    color: white;
                    text-align: right;
                    margin-top: -55px;
                    margin-right: 35px;
                }
                table, th, td {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                td {
                    text-align: center;
                    height: 30px;
                    padding: 8px;
                }
                .header-table { width: 100%; }
                .report_name { font-size: 17px; }
                .content {
                    margin-left: 35px;
                    margin-right: 35px;
                }

                .text-ok { color: green; }
                .text-warning { color: red; }
                .text-error { color: red; }
                .text-info { color: #ecc557; }
                .text-primary { color: blue; }

                .mt-0 { margin-top: 0px; }
                .mb-0 { margin-bottom: 0px; }

                .m-t-5 { margin-top: 5px; }
                .m-b-5 { margin-bottom: 5px; }
                .m-t-10 { margin-top: 10px; }
                .m-b-10 { margin-bottom: 10px; }

                .text-bold { font-weight: bold; } 
                .font-12 { font-size: 12px; }
                .text-align { text-align: justify; }
            </style>
            
            <div class="content">
                <table class="header-table">
                    <tr>
                        <td colspan="4" class="report_name">
                            <b>'.$data['standard_column_auto_report']->name.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-align">
                            <b>Objetivo deste relatório: </b>'.$data['standard_column_auto_report']->report_objective_description.'
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <b>Responsável Técnico</b>
                        </td>
                        <td>
                            <b>Função</b>
                        </td>
                        <td>
                            <b>E-mail</b>
                            </td>
                        <td>
                            <b>Telefone</b>
                        </td>
                    </tr>
                    <tr>
                        <td>'.HelpAdmin::completName().'</td>
                        <td>'.$auth_user->Group->name.'</td>
                        <td>'.$auth_user->email.'</td>
                        <td>'.$auth_user->telephone.'</td>
                    </tr>
                </table>

                <div>
                    <p>
                        <b>Esclarecimentos e Recomendações</b>
                    </p>
                    <p class="text-align">'.$data['standard_column_auto_report']->clarifications_recommendations.'</p>
                </div>

                '.$content_additional_paragraphs.'
                
                '.$content_topics_errors.'

                '.$content_subtopics_errors.'
            </div>
        ';

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 35,
            'margin_bottom' => 35,
            'margin_header' => 0,
            'margin_footer' => 0,
            'defaultPageNumStyle' => '1'
        ]);
        
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list
        // dd('123');
        $mpdf->SetHTMLHeader('
            <img style="" src="'.$img_top.'">
            <div class="count_pages">Página {PAGENO} de {nb}</div>
        ');
        // dd('123');
        $mpdf->SetHTMLFooter('
            <img style="" src="'.$img_footer.'">
        ');
        $mpdf->WriteHTML($html);
        
        $get_url_to_save_storage = HelpAdmin::getUrlToSaveStorageMpdf();
        $path_file = 'auto_reports'.$bar.str_slug($auth_user->first_name).$bar.date('d-m-y');
        $name_file = str_slug($data['name']).'_'.explode(' ', microtime())[1].'.pdf';

        $auto_reports = [
            'name'      =>  $data['name'],
            'name_slug' =>  str_slug($data['name']),
            'path_file' =>  $path_file.$bar.$name_file,
            'user_id'   =>  $auth_user->id,
        ];
        AutoReport::create($auto_reports);

        Storage::makeDirectory($path_file);
        $mpdf->Output($get_url_to_save_storage.$path_file.$bar.$name_file, \Mpdf\Output\Destination::FILE);
        // $mpdf->Output();
        // exit;
        
        session()->flash('notification', 'success:Relatório criado!');
        return redirect()->route('adm.automated_reporting.list');
    }
    // date('(d-m-Y_H-i)')

    public function getSubtopicStatus(Request $req)
    {
        $data = $req->all();
        $status_subtopics = HelpAutoReport::getSubtopicStatus($data['subtopic'], $data['status']);

        return $status_subtopics;
    }
    public function updateSubtopicStatus(Request $req)
    {
        $data = $req->all();
        $status_subtopics = HelpAutoReport::getSubtopicStatus($data['subtopic'], $data['status']);

        try {
            $status_subtopics->update(['description'=>$data['description']]);
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function getTopic(Request $req)
    {
        $data = $req->all();
        $data['topic'] = str_slug($data['topic']);

        return TopicItem::where('name_slug', $data['topic'])->first();
    }
    public function updateTopic(Request $req)
    {
        $data = $req->all();

        try {
            TopicItem::where('name_slug', $data['topic'])->first()
                ->update(['description'=>$data['description']]);
            
            return 1;
        } catch (\Throwable $th) {
            return 0;
        }
    }

    public function list()
    {
        $auto_reports = AutoReport::orderBy('created_at', 'desc')->get();

        return view('Admin.reports.automated_reporting.list', compact('auto_reports'));
    }

    public function alert($id)
    {
        $auto_report = AutoReport::find($id);

        return view('Admin.reports.automated_reporting.alert', compact('auto_report'));
    }
    public function delete(Request $req)
    {
        $data = $req->all();

        $auto_report = AutoReport::find($data['id']);

        Storage::delete($auto_report->path_file);
        $auto_report->delete();

        session()->flash('notification', 'success:Relatório excluído!');
        return redirect()->route('adm.automated_reporting.list');
    }
}