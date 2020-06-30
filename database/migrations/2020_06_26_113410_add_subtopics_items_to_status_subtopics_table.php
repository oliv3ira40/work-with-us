<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubtopicsItemsToStatusSubtopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status_subtopics', function (Blueprint $table) {
            $table->unsignedBigInteger('subtopic_item_id')->nullable();
            $table->foreign('subtopic_item_id')
                ->references('id')->on('subtopics_items')
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
        Schema::table('status_subtopics', function (Blueprint $table) {
            //
        });
    }
}
