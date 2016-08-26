<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->integer('added_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->string('website')->nullable();
            $table->integer('status')->unsigned();
            $table->timestamps();

            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('client_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("clients");
    }
}


//
//    Address1 VARCHAR2(255),
//    Address2 VARCHAR2(255),
//    ADDRESS3 VARCHAR2(255),
//    Town VARCHAR2(255),
//    County VARCHAR2(255),
//    Postcode VARCHAR2(255),
//    Country VARCHAR2(255),
//Consultantid Varchar2(255) Not Null,

//
//
//    PhoneNo VARCHAR2(60),
//    FaxNo VARCHAR2(60),
//    Industry Varchar2(255),