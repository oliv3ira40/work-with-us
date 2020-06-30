<?php

namespace App\Models\Admin\AutoReports;

use Illuminate\Database\Eloquent\Model;

class StatusSubtopic extends Model
{
    protected $table = 'status_subtopics';
    protected $fillable = [
        'name',
        'translated_name',
        'name_slug',
        'description',
        'color',
        'subtopic_item_id'
    ];



    public function SubtopicItem()
    {
        return $this->belongsTo(SubtopicItem::class, 'subtopic_item_id');
    }
}
