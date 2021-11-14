<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Rating;
use Carbon\Carbon;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $faker = Faker::create('ru_RU');

      foreach (range(1, 220) as $v) {
         $img = $faker->numberBetween($min = 1, $max = 5);
         $days = $faker->numberBetween($min = 15, $max = 30);
         $day = $faker->numberBetween($min = 15, $max = 30);
         $renew = $days % 2;

         $ratings = Rating::where('book_id', $v)->get();
         $rate = 0;
         $rating = 0;
         foreach ($ratings as $r) {
            $rate = $rate + $r->rate;
         }
         if (count($ratings) != 0) {
            $rating = $rate / count($ratings);
         }

         $book = new Book;
         if ($v < 51) {
            $book->user_id = $v;
            $book->taken_date = Carbon::now()->subDays($days);
            $book->return_date = Carbon::now()->addDays($day);
            $book->deadline_renewed = $renew;
         }
         $book->img_front = 'img_front' . $img . '.jpg';
         $book->img_side = 'img_side' . $img . '.jpg';
         $book->img_back = 'img_back' . $img . '.jpg';
         $book->title = $faker->realText($maxNbChars = 25);
         $book->author = $faker->name;
         $book->pages = $faker->numberBetween($min = 100, $max = 1000);
         $book->rating = $rating;

         $book->code = $faker->unique()->numberBetween($min = 50000, $max = 99999);
         $book->description = $faker->realText($maxNbChars = 400);
         $book->created_at = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
         $book->updated_at = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
         switch ($v) {
            case ($v > 20 && $v < 40):
               $book->category_id = 1;
               break;

            case ($v > 40 && $v < 60):
               $book->category_id = 2;
               break;

            case ($v > 60 && $v < 80):
               $book->category_id = 3;
               break;

            case ($v > 80 && $v < 100):
               $book->category_id = 4;
               break;

            case ($v > 100 && $v < 120):
               $book->category_id = 5;
               break;

            case ($v > 120 && $v < 140):
               $book->category_id = 6;
               break;

            case ($v > 140 && $v < 160):
               $book->category_id = 7;
               break;

            case ($v > 160 && $v < 180):
               $book->category_id = 8;
               break;

            case ($v > 180 && $v < 200):
               $book->category_id = 9;
               break;

            case ($v > 200 && $v < 220):
               $book->category_id = 10;
               break;
         }
         $book->save();
      }
   }
}
