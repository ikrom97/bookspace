<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      foreach (range(1, 4) as $key) {
         $banner = new Banner;
         $banner->title = 'banner' . $key;
         $banner->img = 'banner' . $key . '.jpg';
         $banner->save();
      }
   }
}
