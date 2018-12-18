<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('idReports');
            $table->string('reportsNumber')->nullable();
            $table->string('reportsNumberLab')->nullable();
            $table->text('reportsItemDescription')->nullable();
            $table->string('ReportsColor')->nullable();
            $table->string('reportsStyle')->nullable();
            $table->string('reportsSKU')->nullable();
            $table->integer('idMetadata')->nullable();
            $table->integer('idSupplier')->nullable();
            $table->date('reportDateIn')->nullable();
            $table->date('reportsDateOut')->nullable();
            $table->string('reportsRating')->nullable();
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
        Schema::drop('reports');
    }
}
