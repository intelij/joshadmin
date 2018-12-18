<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Labs', function (Blueprint $table) {
            $table->increments('idLabs');
            $table->string('LabsName')->nullable();
            $table->string('LabsAddress')->nullable();
            $table->string('LabsCity')->nullable();
            $table->string('LabsZip')->nullable();
            $table->string('LabsPhone')->nullable();
            $table->string('LabsEmail')->nullable();
            $table->string('LabsCountry')->nullable();
            $table->string('LabsFormat')->nullable();
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
        Schema::drop('Labs');
    }
}
