<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_informations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // curriculum_id
            $table->string('path_profile_picture', 250);
            $table->string('full_name', 250);
            $table->date('date_of_birth');
            $table->string('rg', 20);
            $table->string('cpf', 20);
            // address_id
            // wage_claim_id
            // education_id
            // additional_information_id

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
        Schema::dropIfExists('personal_informations');
    }
}
