<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactcompanyTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Contactcompany', function (Blueprint $table) {
            $table->increments('idCompanyContact');
            $table->string('companyContactName')->nullable();
            $table->string('CompanyContactSurname')->nullable();
            $table->string('companyContactPhone')->nullable();
            $table->string('companyContactEmail')->nullable();
            $table->string('CompanyContactTitle')->nullable();
            $table->string('companyContactPrimary')->nullable();
            $table->integer('idCompany')->nullable();
            $table->integer('idCompanyDepartment')->nullable();
            $table->integer('idRoles')->nullable();
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
        Schema::drop('Contactcompany');
    }
}
