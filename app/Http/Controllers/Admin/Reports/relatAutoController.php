<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\HelpAdmin;
use App\Helpers\HelpAutoReport;

use App\Models\Admin\User;

use App\Models\Admin\AutoReports\TopicItem;
use App\Models\Admin\AutoReports\SubtopicItem;
use App\Models\Admin\AutoReports\StatusSubtopic;
use App\Models\Admin\AutoReports\standardColumnAutoReport;

class relatAutoController extends Controller
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
    public function getInformationFromFiles(Request $req)
    {
        $data = $req->all();

        $data['standard_column_auto_report'] = HelpAutoReport::createOrUpdateStandColAutoReport($data);

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
        $bar = DIRECTORY_SEPARATOR;
        $auth_user = \Auth::user();
        $data['standard_column_auto_report'] = standardColumnAutoReport::first();

        $img_top = public_path().$bar.'imgs_reports/top.png';
        $img_footer = public_path().$bar.'imgs_reports/footer.png';
        $img_back_ground = public_path().$bar.'imgs_reports/back-ground.png';
        $img_full_back_ground = public_path().$bar.'imgs_reports/full-back-ground.png';

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
            </style>
            
            <div class="content">
                <table class="header-table">
                    <tr>
                        <td colspan="4" class="report_name">
                            <b>'.$data['standard_column_auto_report']->name.'</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: justify;">
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
                    <p style="margin-top: 0px;">'.$data['standard_column_auto_report']->clarifications_recommendations.'</p>
                </div>
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
        $mpdf->SetHTMLHeader('
            <img style="" src="'.$img_top.'">
            <div class="count_pages">Página {PAGENO} de {nb}</div>
        ');
        $mpdf->SetHTMLFooter('
            <img style="" src="'.$img_footer.'">
        ');

        $mpdf->WriteHTML($html);
        
        $mpdf->Output();
        exit;
        // $mpdf->Output($get_url_to_save_storage.$file_path, \Mpdf\Output\Destination::FILE);
    }
}