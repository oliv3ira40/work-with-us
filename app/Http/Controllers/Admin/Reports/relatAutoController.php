<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\HelpAdmin;

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
        $bar = DIRECTORY_SEPARATOR;
        $auth_user = \Auth::user();
        // dd($data);


        $img_top = public_path().$bar.'imgs_reports/top.png';
        $img_footer = public_path().$bar.'imgs_reports/footer.png';
        $img_back_ground = public_path().$bar.'imgs_reports/back-ground.png';
        $img_full_back_ground = public_path().$bar.'imgs_reports/full-back-ground.png';

        $html = '
            <style>
                body {
                    font-family: Roboto, "Segoe UI", Tahoma, sans-serif;
                }
                @page {
                    background: url('.$img_full_back_ground.') no-repeat 0 0;
                    background-image-resize: 6;
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
            </style>
            
            <table class="header-table">
                <tr>
                    <td colspan="4" class="report_name">
                        <b>'.$data['name'].'</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="4" style="text-align: justify;">
                        <b>Objetivo deste relatório: </b>'.$data['description'].'
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
        ';
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'c',
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 30,
            'margin_bottom' => 15,
            'margin_header' => 3,
            'margin_footer' => 3
        ]);

        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0; // 1 or 0 - whether to indent the first level of a list

        $mpdf->WriteHTML($html);

        // $file_path = 'election'.$bar.$election->id.$bar.'usuarios-nao-votantes-divugacao.pdf';
        // $election->update(['non_participants_report_disclosure'=>$file_path]);
        // $get_url_to_save_storage = HelpersAdmin::getUrlToSaveStorageMpdf();
        
        $mpdf->Output();
        exit;
        // $mpdf->Output($get_url_to_save_storage.$file_path, \Mpdf\Output\Destination::FILE);
    }
}
