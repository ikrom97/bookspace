<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AdminCheck
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle(Request $request, Closure $next)
   {
      $loggedUser = User::find(session()->get('loggedUser'));

      if ($loggedUser->role == 'admin') {
         return $next($request);
      }

      return back()->with('fail', 'У Вас нет доступа!');
   }
}
