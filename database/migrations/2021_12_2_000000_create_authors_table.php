<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->unsignedBigInteger('id', false)->primary();
            $table->unsignedBigInteger('address_id');
            $table->string('firstName');
            $table->string('lastName');
            $table->date('dateOfBirth');
            $table->timestamps();
        });

        Schema::table('authors', function (Blueprint $table) {
            $table->index('address_id');
            $table->foreign('address_id')->references('id')->on('addresses');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
