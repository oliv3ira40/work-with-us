<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonalInformationsToProfessionalsExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professionals_experiences', function (Blueprint $table) {
            $table->unsignedBigInteger('personal_information_id')->nullable();
            $table->foreign('personal_information_id')
                ->references('id')->on('personal_informations')
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
        Schema::table('professionals_experiences', function (Blueprint $table) {
            //
        });
    }
}
