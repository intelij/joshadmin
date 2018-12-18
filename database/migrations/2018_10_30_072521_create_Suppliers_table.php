<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Suppliers', function (Blueprint $table) {
            $table->increments('idSupplier');
            $table->string('supplierName')->nullable();
            $table->string('supplierAddress')->nullable();
            $table->string('supplierCity')->nullable();
            $table->string('supplierZip')->nullable();
            $table->string('supplierPhone')->nullable();
            $table->string('supplierEmail')->nullable();
            $table->string('supplierContactPerson')->nullable();
            $table->string('supplierPrivacy')->nullable();
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
        Schema::drop('Suppliers');
    }
}
