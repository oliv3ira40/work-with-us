<?php

	namespace App\Helpers;
	use URL;

    use App\Models\Admin\AutoReports\TopicItem;
    use App\Models\Admin\AutoReports\SubtopicItem;
    use App\Models\Admin\AutoReports\StatusSubtopic;
    use App\Models\Admin\AutoReports\standardColumnAutoReport;

    use PhpOffice\PhpWord\Element\Section;
    use PhpOffice\PhpWord\Shared\Converter;
	
	/**
	* HelpAutoReport
	*/
	class HelpAutoReport
	{
		public static function createOrUpdateStandColAutoReport($data)
		{
            $standard_column_auto_report = standardColumnAutoReport::first();
            if ($standard_column_auto_report == null) {
                $standard_column_auto_report = standardColumnAutoReport::create($data);
            } else {
                $standard_column_auto_report->update($data);
            }

            return $standard_column_auto_report;
        }
        
        public static function getSubtopicStatus($name_subtopic, $name_status)
        {
            $name_subtopic = str_slug($name_subtopic);
            $name_status = str_slug($name_status);

            $subtopic_item = SubtopicItem::where('name_slug', $name_subtopic)->first();
            $status_subtopics = $subtopic_item->StatusSubtopics->where('name_slug', $name_status)->first();
        
            return $status_subtopics;
        }

        public static function generatePdfReport($reports_data)
        {
            $bar = DIRECTORY_SEPARATOR;
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
                <img style="" src="'.$reports_data['img_top'].'">
                <div class="count_pages">Página {PAGENO} de {nb}</div>
            ');
            $mpdf->SetHTMLFooter('
                <img style="" src="'.$reports_data['img_footer'].'">
            ');
            $mpdf->WriteHTML($reports_data['html']);
            
            $get_url_to_save_storage = HelpAdmin::getUrlToSaveStorageMpdf();
            $name_file = str_slug($reports_data['name']).'_'.explode(' ', microtime())[1].'.pdf';
            $mpdf->Output($get_url_to_save_storage.$reports_data['path_file'].$bar.$name_file, \Mpdf\Output\Destination::FILE);
            // $mpdf->Output();
            // exit;

            $path_file = $reports_data['path_file'].$bar.$name_file;
            return $path_file;
        }

        public static function generateDocxReport($reports_data)
        {
            $bar = DIRECTORY_SEPARATOR;
            $reports_data['html'] = HelpAutoReport::prepareHtmlDocxReport($reports_data['html']);

            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection([
                'marginTop' => 2000,
                'marginBottom' => 2000,
                'marginLeft' => 550,
                'marginRight' => 550,
                'headerHeight' => 0,
                'footerHeight' => 0,
                // 'orientation' => 'landscape'
            ]);

            $header = $section->addHeader();
            $footer = $section->addFooter();
            $header->addImage(
                $reports_data['img_top'],
                [
                    'width'         => '595',
                    'height'        => '75',
                    'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_ABSOLUTE,
                    'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_CENTER,
                    'posHorizontalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
                    'posVerticalRel'   => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
                    // 'width'            => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(5),
                    // 'height'           => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(3),
                    // 'marginTop'        => \PhpOffice\PhpWord\Shared\Converter::cmToPixel(2),
                ]
                
            );
            $footer->addImage(
                $reports_data['img_footer'],
                [
                    'width'         => '595',
                    'height'        => '75',
                    'positioning'      => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE,
                    'posHorizontal'    => \PhpOffice\PhpWord\Style\Image::POSITION_HORIZONTAL_CENTER,
                    'posHorizontalRel' => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
                    'posVertical'      => \PhpOffice\PhpWord\Style\Image::POSITION_VERTICAL_BOTTOM,
                    'posVerticalRel'   => \PhpOffice\PhpWord\Style\Image::POSITION_RELATIVE_TO_PAGE,
                ]
            );

            $header->addWatermark(
                $reports_data['img_back_ground'],
                [
                    'width'         => '595',
                    'height'        => '790',
                    'marginTop' => 30,
                    'marginLeft' => 0,
                    'posHorizontal' => 'absolute',
                    'posVertical' => 'absolute',
                ]
            );

            \PhpOffice\PhpWord\Shared\Html::addHtml($section, $reports_data['html'], false, false);

            // Saving the document as OOXML file...
            $get_url_to_save_storage = HelpAdmin::getUrlToSaveStorageMpdf();
            $name_file = str_slug($reports_data['name']).'_'.explode(' ', microtime())[1].'.docx';
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
            $objWriter->save($get_url_to_save_storage.$reports_data['path_file'].$bar.$name_file);
            
            $path_file = $reports_data['path_file'].$bar.$name_file;
            return $path_file;
        }
        public static function prepareHtmlDocxReport($html)
        {
            $start_string = strpos($html, '<div class="content">');
            $html = substr($html, $start_string, -1);
            // dd($html);

            $html = str_replace('<br>', '<br></br>', $html);
            $html = str_replace('class', 'style', $html);
            
            $html = str_replace('text-ok', 'color: green;', $html);
            $html = str_replace('text-warning', 'color: red;', $html);
            $html = str_replace('text-error', 'color: red;', $html);
            $html = str_replace('text-info', 'color: #ecc557;', $html);
            $html = str_replace('text-primary', 'color: blue;', $html);
            
            $html = str_replace('count_pages', 'color: white; text-align: right; margin-top: -55px; margin-right: 35px;', $html);
            
            $html = str_replace('header-table', 'width: 100%;', $html);
            $html = str_replace('report_name', 'font-size: 17px;', $html);            
            $html = str_replace('content', 'font-family: Roboto, Segoe UI, Tahoma, sans-serif;', $html);
            
            $html = str_replace('mt-0', 'margin-top: 0px;', $html);
            $html = str_replace('mb-0', 'margin-bottom: 0px;', $html);
            
            $html = str_replace('m-t-5', 'margin-top: 5px;', $html);
            $html = str_replace('m-b-5', 'margin-bottom: 5px;', $html);
            $html = str_replace('m-t-10', 'margin-top: 10px;', $html);
            $html = str_replace('m-t-20', 'margin-top: 20px;', $html);
            $html = str_replace('m-b-10', 'margin-bottom: 10px;', $html);
            
            $html = str_replace('text-bold', 'font-weight: bold;', $html);
            $html = str_replace('font-12', 'font-size: 12px;', $html);
            $html = str_replace('text-align', '', $html);
            $html = str_replace('justify-phpword', 'text-align: justify;', $html);
            
            $html = str_replace('_td', 'text-align: center; height: 30px; padding: 8px; border: 1px solid black; border-collapse: collapse;', $html);
            $html = str_replace('_table', 'border: 1px solid black; border-collapse: collapse;', $html);

            // dd($html);
            return $html;
        }
	}