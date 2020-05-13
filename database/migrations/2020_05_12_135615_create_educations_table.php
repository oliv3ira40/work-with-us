<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->tinyInteger('i_still_dont_have_schooling');
            // {schooling_available_id}
            $table->string('institution', 150);
            $table->string('course', 150);
            // {type_of_course_id}
            $table->string('starting_month', 10);
            $table->string('starting_year', 10);
            $table->string('conclusion_month', 10);
            $table->string('conclusion_year', 10);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
