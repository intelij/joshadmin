<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDepartmentCompanyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departmentCompany', function (Blueprint $table) {
            $table->increments('idCompanyDepartment');
            $table->string('departmentName')->nullable();
            $table->string('departmentAddress')->nullable();
            $table->string('departmentCity')->nullable();
            $table->string('departmentZIP')->nullable();
            $table->string('DepartmentPhone')->nullable();
            $table->string('departmentEmail')->nullable();
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
        Schema::drop('departmentCompany');
    }
}
