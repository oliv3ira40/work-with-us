<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopkeepersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopkeepers', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name');
            $table->string('company_name', 200)->nullable();
            $table->string('telephone', 30)->nullable();
            $table->date('foundation_date')->nullable();
            $table->string('cnpj', 20)->unique()->nullable();

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
        Schema::dropIfExists('shopkeepers');
    }
}
