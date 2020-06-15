<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalsInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additionals_informations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->tinyInteger('disability_proven_by_medical_report')->nullable();
            $table->string('medical_report_path', 250)->nullable();
            // {mean_public_vacancie_id}

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
        Schema::dropIfExists('additionals_informations');
    }
}
