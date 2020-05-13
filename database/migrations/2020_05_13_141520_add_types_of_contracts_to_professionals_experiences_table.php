<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypesOfContractsToProfessionalsExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('professionals_experiences', function (Blueprint $table) {
            $table->unsignedBigInteger('type_of_contract_id')->nullable();
            $table->foreign('type_of_contract_id')
                ->references('id')->on('types_of_contracts_availables')
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
