<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOfficesToOfficesAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices_address', function (Blueprint $table) {
            $table->unsignedBigInteger('office_id')->nullable();

            $table->foreign('office_id')
            ->references('id')->on('offices')
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
        Schema::table('offices_address', function (Blueprint $table) {
            //
        });
    }
}
