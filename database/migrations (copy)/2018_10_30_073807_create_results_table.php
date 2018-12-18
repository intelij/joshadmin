<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResultsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('idResults');
            $table->string('resultsComments')->nullable();
            $table->string('resultsLabRating')->nullable();
            $table->integer('idParts')->nullable();
            $table->integer('idAnalysis')->nullable();
            $table->integer('idComponents')->nullable();
            $table->integer('idUnitMeasure')->nullable();
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
        Schema::drop('results');
    }
}
