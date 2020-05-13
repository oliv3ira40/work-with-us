<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactsInformationsToPhonesForContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phones_for_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_information_id')->nullable();
            $table->foreign('contact_information_id')
                ->references('id')->on('contacts_informations')
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
        Schema::table('phones_for_contacts', function (Blueprint $table) {
            //
        });
    }
}
