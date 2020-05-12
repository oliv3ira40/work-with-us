<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('zip_code', 20)->nullable();
            $table->string('street', 200)->nullable();
            $table->string('neighborhood', 30)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('state', 20)->nullable();
            $table->string('ibge', 20)->nullable();
            
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
        Schema::dropIfExists('offices_address');
    }
}
