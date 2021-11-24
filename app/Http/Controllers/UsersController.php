<?php

namespace App\Http\Controllers;

use App\Models\TempAvatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\SendCredentials;

class UsersController extends Controller
{
   public function search(Request $request)
   {
      $keyword = $request->keyword;
      $users = User::select('id', 'surname', 'name', 'last_name', 'trashed')
         ->where('trashed', false)
         ->where(function ($query) use ($keyword) {
            $query->where('surname', 'like', '%' . $keyword . '%')
               ->orWhere('name', 'like', '%' . $keyword . '%')
               ->orWhere('last_name', 'like', '%' . $keyword . '%');
         })->paginate(9);

      return view('dashboard.users.search-result', compact('users'));
   }

   public function create(Request $request)
   {
      // validation
      $request->validate([
         'name' => 'required',
         'surname' => 'required',
         'last_name' => 'required',
         'role' => 'required',
         'login' => 'required|unique:users',
         'email' => 'required|email',
         'phone' => 'required|numeric|digits:9',
         'company' => 'required',
         'description' => 'required',
      ]);
      // create new user
      $user = new User;
      if ($request->file('avatar')) {
         $file = $request->file('avatar');
         $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
         $path = public_path('img/users');
         $file->move($path, $fileName);
         $user->avatar = $fileName;
      }
      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->last_name = $request->last_name;
      $user->role = $request->role;
      $user->email = $request->email;
      $user->login = $request->login;

      $password = Str::random(9);
      $user->password = Hash::make($password);
      $details = ['login' => $user->login, 'password' => $password];
      Mail::to($user->email)->send(new SendCredentials($details));

      $user->phone = $request->phone;
      $user->company_id = $request->company;
      $user->description = $request->description;
      $save = $user->save();

      if ($save) {
         return back()->with('success', 'Вы успешно добавили нового пользователя');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function update(Request $request)
   {
      // validation
      $request->validate([
         'name' => 'required',
         'surname' => 'required',
         'last_name' => 'required',
         'role' => 'required',
         'email' => 'required|email',
         'phone' => 'required|numeric|digits:9',
         'company' => 'required',
         'description' => 'required',
      ]);

      $user = User::find($request->input('user-id'));

      if ($request->login != $user->login) {
         $request->validate([
            'login' => 'required|unique:users',
         ]);
      }

      if ($request->file('avatar')) {
         $file = $request->file('avatar');
         $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

         $path = public_path('img/users/' . $user->avatar);
         if (file_exists($path)) {
            unlink($path);
         }

         $path = public_path('img/users');
         $file->move($path, $fileName);
         $user->avatar = $fileName;
      }

      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->last_name = $request->last_name;
      $user->role = $request->role;
      $user->email = $request->email;
      $user->login = $request->login;
      $user->phone = $request->phone;
      if ($request->blacklist == 'on') {
         $user->blacklist = true;
      } else {
         $user->blacklist = false;
      }
      $user->company_id = $request->company;
      $user->description = $request->description;
      $save = $user->save();

      if ($save) {
         return back()->with('success', 'Данные пользователя успешно изменены!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function delete(Request $request)
   {
      $user = User::find($request->input('user-id'));

      $user->trashed = true;
      $save = $user->save();

      if ($save) {
         return redirect(route('dashboard.users'))->with('success', 'Пользователь успешно удален!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function avatarTempstore(Request $request)
   {
      // store avatar temporary
      $avatar = $request->file('file');
      $avatarName = uniqid() . '.' . $avatar->getClientOriginalExtension();
      $temporaryAvatar = TempAvatar::first();
      if ($temporaryAvatar) {
         $path = public_path('img/users/temporary/' . $temporaryAvatar->filename);
         if (file_exists($path)) {
            unlink($path);
         }
         $temporaryAvatar->filename = $avatarName;
         $temporaryAvatar->save();
         $path = public_path('img/users/temporary');
         $avatar->move($path, $avatarName);
         return asset('img/users/temporary/' . $avatarName);
      } else {
         $temporaryAvatar = new TempAvatar;
         $temporaryAvatar->filename = $avatarName;
         $temporaryAvatar->save();
         $path = public_path('img/users/temporary');
         $avatar->move($path, $avatarName);
         return asset('img/users/temporary/' . $avatarName);
      }
   }
}
