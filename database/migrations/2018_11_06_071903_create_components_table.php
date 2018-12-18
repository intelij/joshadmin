<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComponentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('idComponents');
            $table->string('ComponentsName')->nullable();
            $table->text('ComponentsDescription')->nullable();
            $table->string('ComponentsCAS')->nullable();
            $table->string('ComponentsFomular')->nullable();
            $table->integer('idComponentsFamily')->nullable();
            $table->integer('idAnalysis')->nullable();
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
        Schema::drop('components');
    }
}
