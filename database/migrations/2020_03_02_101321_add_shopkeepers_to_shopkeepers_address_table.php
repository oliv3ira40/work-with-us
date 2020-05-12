<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddShopkeepersToShopkeepersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopkeepers_address', function (Blueprint $table) {
            $table->unsignedBigInteger('shopkeeper_id')->nullable();

            $table->foreign('shopkeeper_id')
            ->references('id')->on('shopkeepers')
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
        Schema::table('shopkeepers_address', function (Blueprint $table) {
            //
        });
    }
}
