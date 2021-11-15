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
         $table->id();
         $table->integer('category_id');
         $table->bigInteger('user_id')->nullable();
         $table->timestamp('taken_date')->nullable();
         $table->timestamp('return_date')->nullable();
         $table->boolean('deadline_renewed')->default(false);
         $table->string('img_front')->default('img_front.jpg');
         $table->string('img_back')->default('img_back.jpg');
         $table->string('img_side')->default('img_side.jpg');
         $table->string('title');
         $table->string('author');
         $table->bigInteger('pages');
         $table->integer('rating')->default(0);
         $table->bigInteger('code')->unique();
         $table->text('description');
         $table->boolean('trashed')->default(false);
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
      Schema::dropIfExists('books');
   }
}
