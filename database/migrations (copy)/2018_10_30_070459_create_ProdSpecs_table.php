<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdSpecsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ProdSpecs', function (Blueprint $table) {
            $table->increments('idProdSpec');
            $table->string('prodSpecValue')->nullable();
            $table->string('prodSpecMU')->nullable();
            $table->text('prodSpecReference')->nullable();
            $table->integer('idRSL')->nullable();
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
        Schema::drop('ProdSpecs');
    }
}
