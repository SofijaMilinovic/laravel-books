<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->unsignedBigInteger('id', false)->primary();
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->string('description', 10000);
            $table->decimal('rating', 5, 2);
            $table->decimal('price', 5, 2);
            $table->timestamps();
        });
    
        Schema::table('books', function (Blueprint $table) {
            $table->index('author_id');
            $table->foreign('author_id')->references('id')->on('authors');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
