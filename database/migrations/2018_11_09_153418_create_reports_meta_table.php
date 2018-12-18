<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reports_id')->unsigned();
            $table->integer('meta_id')->unsigned();
            $table->string('metaDataName')->nullable();
            $table->string('value')->nullable();

            $table->foreign('reports_id')->references('idReports')->on('reports')->onDelete('cascade');
            $table->foreign('meta_id')->references('idMetadata')->on('Metadata')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports_meta');
    }
}
