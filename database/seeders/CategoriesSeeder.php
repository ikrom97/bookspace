<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $categories = ['Soft skills', 'Hard skills', 'Маркетинг', 'Менеджмент', 'Финансы', 'Staff менеджмент', 'Продажи и переговоры', 'Сервис', 'ИТ', 'Художественная литература'];

      foreach ($categories as $title) {
         $category = new Category;
         $category->title = $title;
         $category->save();
      }
   }
}
