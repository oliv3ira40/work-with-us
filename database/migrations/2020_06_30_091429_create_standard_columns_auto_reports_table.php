<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardColumnsAutoReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_columns_auto_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 400)->nullable();
            $table->string('report_objective_description', 3000)->nullable();
            $table->string('clarifications_recommendations', 3000)->nullable();
            
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
        Schema::dropIfExists('standard_columns_auto_reports');
    }
}
