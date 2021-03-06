<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('companies', function (Blueprint $table) {
         $table->id();
         $table->string('title');
         $table->bigInteger('read_books')->default(0);
         $table->bigInteger('read_pages')->default(0);
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
      Schema::dropIfExists('companies');
   }
}
