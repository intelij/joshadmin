<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRSLsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('RSLs', function (Blueprint $table) {
            $table->increments('idRSL');
            $table->string('RSLName')->nullable();
            $table->text('RSLDescription')->nullable();
            $table->date('RSLStart')->nullable();
            $table->date('RSLEnd')->nullable();
            $table->integer('idAnalysis')->nullable();
            $table->integer('idCompanyContact')->nullable();
            $table->integer('idCompany')->nullable();
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
        Schema::drop('RSLs');
    }
}
