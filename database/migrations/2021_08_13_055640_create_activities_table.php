<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('activities', function (Blueprint $table) {
         $table->id();
         $table->string('moderator');
         $table->timestamp('start');
         $table->timestamp('end');
         $table->string('audience');
         $table->integer('participants_quantity');
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
      Schema::dropIfExists('activities');
   }
}
