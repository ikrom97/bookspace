<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Presentation;
use App\Models\User;
use Illuminate\Http\Request;

class PresentationsController extends Controller
{
   public function participate(Request $request)
   {
      $user = User::find(session('loggedUser'));

      $presentation = Presentation::where('trashed', false)->find($request->id);

      foreach ($presentation->participants as $participant) {
         if ($participant->id == $user->id) {
            return back()->with('fail', 'Вы уже являетесь участником!');
         }
      }

      $presentation->participants()->attach($user->id);

      return back()->with('success', 'Вы успешно добавлены в список участников!');
   }

   public function send(Request $request)
   {
      // validation
      $request->validate([
         'book' => 'required',
         'datetime' => 'required',
         'audience' => 'required|min:3',
         'participants' => 'required|integer|min:10',
         'description' => 'required|min:50',
         'presentation' => 'required',
      ]);
      // Store presentation
      $file = $request->file('presentation');
      $path = public_path('files');
      $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
      $file->move($path, $fileName);
      // Store presentation table 
      $presentation = new Presentation;
      $presentation->user_id = session()->get('loggedUser');
      $presentation->book_id = $request->book;
      $presentation->date = $request->datetime;
      $presentation->audience = $request->audience;
      $presentation->participants_quantity = $request->participants;
      $presentation->description = $request->description;
      $presentation->presentation = $fileName;
      $save = $presentation->save();
      // Make notification for admin 
      $notification = new Notification;
      $notification->type = 'presentation';
      $notification->type_id = $presentation->id;
      $notification->save();

      $admins = User::where('role', 'admin')->get();
      foreach ($admins as $admin) {
         $admin->notifications()->attach($notification->id);
      }
      // Show success when user is stored
      if ($save) {
         return back()->with('success', 'Ваш запрос на проведение презентации успешно отправлен!');
      }
      // Show fail when user is not stored
      else {
         return back()->with('fail', 'Что-то пошло не так попробуйте позже!');
      }
   }

   public function accept(Presentation $presentation)
   {
      $presentation->accepted = true;
      $presentation->denied = false;
      $presentation->save();

      $notification = new Notification;
      $notification->type = 'presentation_accepted';
      $notification->type_id = $presentation->id;
      $notification->save();

      $userId = $presentation->user->id;
      $user = User::find($userId);
      $user->notifications()->attach($notification->id);

      return back()->with('success', 'Операция прошла успешно. Презентация подтверждена!');
   }

   public function deny(Presentation $presentation)
   {
      $presentation->denied = true;
      $presentation->accepted = false;
      $presentation->save();

      $notification = new Notification;
      $notification->type = 'presentation_denied';
      $notification->type_id = $presentation->id;
      $notification->save();

      $userId = $presentation->user->id;
      $user = User::find($userId);
      $user->notifications()->attach($notification->id);

      return back()->with('success', 'Операция прошла успешно. Презентация отклонена!');
   }

   public function download(Presentation $presentation)
   {
      $file = public_path() . '/files/' . $presentation->presentation;

      $extension = pathinfo($file, PATHINFO_EXTENSION);

      $headers = array(
         'Content-Type: application/' . $extension,
      );

      return response()->download($file, $presentation->presentation, $headers);
   }
}
