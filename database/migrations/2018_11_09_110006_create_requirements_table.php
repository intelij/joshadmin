<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('idRequirements');
            $table->string('LOQ')->nullable();
            $table->string('limit')->nullable();
            $table->string('upperlimit')->nullable();
            $table->text('commments')->nullable();
            $table->string('score_value')->nullable();
            $table->integer('idAnalysis')->nullable();
            $table->integer('idRsl')->nullable();
            $table->integer('idComponents')->nullable();
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
        Schema::dropIfExists('requirements');
    }
}
