<?php

namespace App\Models\Admin\AutoReports;

use Illuminate\Database\Eloquent\Model;

class TopicItem extends Model
{
    protected $table = 'topics_items';
    protected $fillable = [
        'name',
        'translated_name',
        'name_slug',
        'description'
    ];



    public function SubtopicsItems()
    {
        return $this->hasMany(SubtopicItem::class, 'topic_item_id');
    }
}
