<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function login(Request $request)
   {
      return view('auth.login');
   }

   public function check(Request $request)
   {
      // Validation
      $request->validate([
         'login' => 'required|min:3',
         'password' => 'required|min:4'
      ]);
      // Find user by login
      $user = User::where('trashed', false)->where('login', '=', $request->login)->first();
      // Show fail when user is not founded
      if (!$user) {
         return back()->with('fail', 'Мы не узнаем ваш адрес для входа');
      }
      // Match the passwords
      if (Hash::check($request->password, $user->password)) {
         // Don't allow to enter if user is in blacklist
         if ($user->blacklist) {
            return back()->with('fail', 'Вы заблокированы! Обратитесь в администрацию');
         } else {
            $request->session()->put('loggedUser', $user->id);
            return redirect(route('home'));
         }
      }
      // Show fail when password is not matched
      else {
         return back()->with('fail', 'Неверный пароль');
      }
   }

   public function logout()
   {
      if (session()->has('loggedUser')) {
         session()->pull('loggedUser');
         return redirect(route('auth.login'));
      }
   }
}
