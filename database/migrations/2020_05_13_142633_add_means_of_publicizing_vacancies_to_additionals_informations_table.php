<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeansOfPublicizingVacanciesToAdditionalsInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('additionals_informations', function (Blueprint $table) {
            $table->unsignedBigInteger('mean_public_vacancie_id')->nullable();
            $table->foreign('mean_public_vacancie_id')
                ->references('id')->on('means_of_publicizing_vacancies')
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
