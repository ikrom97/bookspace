<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
   public function search(Request $request)
   {
      return back();
   }

   public function feedbackSend(Request $request)
   {
      $user = User::where('trashed', false)->find(session('loggedUser'));

      $feedback = new Feedback;
      $feedback->user_id = $user->id;
      $feedback->message = $request->message;
      $feedback->save();

      $notification = new Notification;
      $notification->type = 'feedback';
      $notification->type_id = $feedback->id;
      $notification->save();

      $admins = User::where('trashed', false)->where('role', 'admin')->get();
      foreach ($admins as $admin) {
         $admin->notifications()->attach($notification->id);
      }

      return back()->with('success', 'Ваше сообщение отправлено!');
   }

   public function updateAvatar(Request $request)
   {
      $request->validate([
         'avatar' => 'required|max:100',
      ]);

      $user = User::find(session()->get('loggedUser'));
      $file = $request->file('avatar');

      // Delete previous avatar if exists
      if ($user->avatar != 'default.jpg') {
         $path = public_path('img/users/' . $user->avatar);
         if (file_exists($path)) {
            unlink($path);
         }
      }
      // Store new avatar
      $path = public_path('img/users');
      $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
      $file->move($path, $fileName);
      // Update user's avatar
      $user->avatar = $fileName;
      $user->save();

      return back()->with('success', 'Фото профиля успешно изменен!');
   }

   public function updateInfo(Request $request)
   {
      $user = User::find(session()->get('loggedUser'));
      // Validate user's fields
      $request->validate([
         'name' => 'required|min:3',
         'surname' => 'required|min:3',
         'last_name' => 'required|min:5',
         'email' => 'required|email',
         'phone' => 'required|numeric|digits:9'
      ]);
      if ($request->login != $user->login) {
         $request->validate([
            'login' => 'required|min:3|unique:users',
         ]);
      }
      // Update user's fields
      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->last_name = $request->last_name;
      $user->email = $request->email;
      $user->phone = $request->phone;
      $user->login = $request->login;
      $save = $user->save();

      if ($save) {
         return redirect()->to(url()->previous() . '#profile-info')->with('success', 'Ваши данные успешно изменены!');
      } else {
         return redirect()->to(url()->previous() . '#profile-info')->with('fail', 'Что-то пошло не так попробуйте позже!');
      }
   }

   public function updatePassword(Request $request)
   {
      $request->validate([
         'password' => 'required',
         'new-password' => 'required',
         'confirm-password' => 'required',
      ]);

      $user = User::find(session()->get('loggedUser'));

      if (Hash::check($request->password, $user->password)) {
         if ($request->input('new-password') == $request->input('confirm-password')) {
            $user->password = bcrypt($request->input('new-password'));
            $user->save();
            return redirect()->to(url()->previous() . '#profile-password')->with('success', 'Ваш пароль успешно изменен!');
         }
         return redirect()->to(url()->previous() . '#profile-password')->with('fail', 'Пароли не совпадают!');
      } else {
         return redirect()->to(url()->previous() . '#profile-password')->with('fail', 'Неправильный пароль попробуйте ещё!');
      }

   }
}
