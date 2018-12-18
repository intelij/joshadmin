<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactLabsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contactLabs', function (Blueprint $table) {
            $table->increments('idLabsContact');
            $table->string('labsContactName')->nullable();
            $table->string('labsContactSurname')->nullable();
            $table->string('LabsContactPhone')->nullable();
            $table->string('labsContactMobile')->nullable();
            $table->string('labsContactEmail')->nullable();
            $table->string('labsContactTitle')->nullable();
            $table->string('labsContactJobTitle')->nullable();
            $table->integer('idLabs')->nullable();
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
        Schema::drop('contactLabs');
    }
}
