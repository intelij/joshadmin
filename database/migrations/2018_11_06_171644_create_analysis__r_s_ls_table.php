<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnalysisRSLsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_RSLs', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('analysis_id')->unsigned();
            $table->integer('RSLs_id')->unsigned();

            $table->foreign('analysis_id')->references('idAnalysis')->on('analysis')->onDelete('cascade');
            $table->foreign('RSLs_id')->references('idRSL')->on('RSLs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analysis_RSLs');
    }
}
