<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTopicsItemsToSubtopicsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subtopics_items', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_item_id')->nullable();
            $table->foreign('topic_item_id')
                ->references('id')->on('topics_items')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subtopics_items', function (Blueprint $table) {
            //
        });
    }
}
