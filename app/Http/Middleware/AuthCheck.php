<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
      if (!session()->has('loggedUser') && $request->path() != 'auth/login') {

         return redirect(route('auth.login'))->with('fail', 'Вы должны быть зарегистрированы');
      }

      $loggedUser = User::select('id', 'blacklist')->find(session()->get('loggedUser'));

      if ($loggedUser && $loggedUser->blacklist) {
         session()->pull('loggedUser');
         return redirect(route('auth.login'))->with('fail', 'Вы заблокированы! Обратитесь в администрацию');
      }

      if (session()->has('loggedUser') && $request->path() == 'auth/login') {
         return back();
      }

      $response = $next($request);
      $headers = [
         'Cache-Control' => 'nocache, no-store, max-age=0, must-revalidate',
         'Pragma', 'no-cache',
         'Expires', 'Fri, 01 Jan 1990 00:00:00 GMT',
      ];

      foreach ($headers as $key => $value) {
         $response->headers->set($key, $value);
      }

      return $response;
   }
}
