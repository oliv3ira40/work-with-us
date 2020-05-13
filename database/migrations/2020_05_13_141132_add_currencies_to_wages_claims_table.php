<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrenciesToWagesClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wages_claims', function (Blueprint $table) {
            $table->unsignedBigInteger('currencie_available_id')->nullable();
            $table->foreign('currencie_available_id')
                ->references('id')->on('currencies_available')
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
        Schema::table('wages_claims', function (Blueprint $table) {
            //
        });
    }
}
