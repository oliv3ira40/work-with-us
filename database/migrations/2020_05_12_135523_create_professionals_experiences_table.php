<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');

            // personal_information_id
            $table->tinyInteger('i_dont_have_experience')->nullable();
            $table->string('office', 100);
            $table->string('company', 100);
            // {currencie_available_id}
            $table->decimal('value', 11, 2)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('starting_month', 10)->nullable();
            $table->string('starting_year', 10)->nullable();
            
            $table->tinyInteger('work_here_currently')->nullable();
            $table->string('conclusion_month', 10)->nullable();
            $table->string('conclusion_year', 10)->nullable();
            $table->string('benefits', 100)->nullable();
            // {type_of_contract_id}

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
        Schema::dropIfExists('professionals_experiences');
    }
}
