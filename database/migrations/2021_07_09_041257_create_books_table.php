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
         $table->bigInteger('category_id')->nullable();
         $table->bigInteger('user_id')->nullable();
         $table->timestamp('taken_date')->nullable();
         $table->timestamp('return_date')->nullable();
         $table->boolean('deadline_renewed')->default(false);
         $table->string('img_front')->default('default.jpg');
         $table->string('img_back')->default('default.jpg');
         $table->string('img_side')->default('default.jpg');
         $table->string('title');
         $table->string('author');
         $table->bigInteger('pages');
         $table->integer('rating')->nullable();
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
