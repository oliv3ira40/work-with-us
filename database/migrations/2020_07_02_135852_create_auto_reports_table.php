<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auto_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 150)->nullable();
            $table->string('name_slug', 150)->nullable();
            $table->string('path_file_pdf', 300)->nullable();
            $table->string('path_file_docx', 300)->nullable();
            // user_id

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
        Schema::dropIfExists('auto_reports');
    }
}
