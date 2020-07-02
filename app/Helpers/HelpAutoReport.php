<?php

	namespace App\Helpers;
	use URL;

    use App\Models\Admin\AutoReports\TopicItem;
    use App\Models\Admin\AutoReports\SubtopicItem;
    use App\Models\Admin\AutoReports\StatusSubtopic;
    use App\Models\Admin\AutoReports\standardColumnAutoReport;
	
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
	}