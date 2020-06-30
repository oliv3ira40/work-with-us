<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->string('name', 200)->nullable();
            $table->string('translated_name', 200)->nullable();
            $table->string('name_slug', 200);
            $table->string('description', 2000)->nullable();
            
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
        Schema::dropIfExists('topics_items');
    }
}
