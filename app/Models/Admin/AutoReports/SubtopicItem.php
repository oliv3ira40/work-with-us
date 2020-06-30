<?php

namespace App\Models\Admin\AutoReports;

use Illuminate\Database\Eloquent\Model;

class SubtopicItem extends Model
{
    protected $table = 'subtopics_items';
    protected $fillable = [
        'name',
        'translated_name',
        'name_slug',
        'description',
        'topic_item_id'
    ];



    public function TopicItem()
    {
        return $this->belongsTo(TopicItem::class, 'topic_item_id');
    }

    public function StatusSubtopics()
    {
        return $this->hasMany(StatusSubtopic::class, 'subtopic_item_id');
    }
}
