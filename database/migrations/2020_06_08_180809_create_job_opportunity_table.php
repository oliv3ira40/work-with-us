<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOpportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_opportunities', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 100);
            $table->string('occupation_area', 200);
            $table->string('description', 4000);

            // state_id
            // city_id
            
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
        Schema::dropIfExists('job_opportunity');
    }
}
