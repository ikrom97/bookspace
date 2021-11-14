<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryBooksImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_books_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('main')->default('default.jpg');
            $table->string('front')->default('default.jpg');
            $table->string('back')->default('default.jpg');
            $table->string('side')->default('default.jpg');
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
        Schema::dropIfExists('temporary_books_imgs');
    }
}
