<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompanyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('idCompany');
            $table->string('companyName')->nullable();
            $table->string('companyAddress')->nullable();
            $table->string('CompanyCity')->nullable();
            $table->string('companyPhone')->nullable();
            $table->string('companyEmail')->nullable();
            $table->string('companyVat')->nullable();
            $table->string('companyGrade')->nullable();
            $table->string('companyLink')->nullable();
            $table->string('CompanyZip')->nullable();
            $table->integer('idCompanyGrade')->nullable();
            $table->integer('idCompanyOption')->nullable();
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
        Schema::drop('company');
    }
}
