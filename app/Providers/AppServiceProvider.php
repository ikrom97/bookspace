<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Site;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register()
   {
      //
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
      Schema::defaultStringLength(191);

      Paginator::useBootstrap();

      view()->composer('*', function ($view) {
         if (session()->has('loggedUser')) {
            $loggedUser = User::find(session()->get('loggedUser'));

            $notes = $loggedUser->notifications()->where('new', true)->get();

            $site = Site::first();

            $categories = Category::get();

            return $view->with('loggedUser', $loggedUser)
               ->with('notes', $notes)
               ->with('site', $site)
               ->with('categories', $categories)
               ->with('route', \Route::currentRouteName());
         }
      });
   }
}
