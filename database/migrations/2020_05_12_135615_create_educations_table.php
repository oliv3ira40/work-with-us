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

            $table->tinyInteger('i_still_dont_have_schooling')->nullable();
            // {schooling_available_id}
            $table->string('institution', 150)->nullable();
            $table->string('course', 150)->nullable();
            // {type_of_course_id}
            $table->string('starting_month', 10)->nullable();
            $table->string('starting_year', 10)->nullable();
            $table->string('conclusion_month', 10)->nullable();
            $table->string('conclusion_year', 10)->nullable();

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
