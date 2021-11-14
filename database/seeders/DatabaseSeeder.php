<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {
      $site = new Site;
      $site->title = 'Ats Book Space';
      $site->phone = '(+992) 95-143-99-75';
      $site->address = 'г. Душанбе, ул. А. Каххоров, д. 19/8';
      $site->save();

      $this->call([
         CategoriesSeeder::class,
         RatingsSeeder::class,
         BooksSeeder::class,
         TakenBooksSeeder::class,
         UsersSeeder::class,
         CompaniesSeeder::class,
         CommentsSeeder::class,
         PresentationsSeeder::class,
         ActivitiesSeeder::class,
         BookedBooksSeeder::class,
      ]);
   }
}
