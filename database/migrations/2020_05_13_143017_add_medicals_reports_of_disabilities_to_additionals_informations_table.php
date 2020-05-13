<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMedicalsReportsOfDisabilitiesToAdditionalsInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('additionals_informations', function (Blueprint $table) {
            $table->unsignedBigInteger('medical_report_disab_id')->nullable();
            $table->foreign('medical_report_disab_id')
                ->references('id')->on('medicals_reports_of_disabilities')
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
        Schema::table('additionals_informations', function (Blueprint $table) {
            //
        });
    }
}
