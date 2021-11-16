<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\User;
use Illuminate\Http\Request;

class PresentationsController extends Controller
{
   public function participate(Request $request)
   {
      $user = User::find(session('loggedUser'));

      $presentation = Presentation::find($request->id);

      foreach ($presentation->participants as $participant) {
         if ($participant->id == $user->id) {
            return back()->with('fail', 'Вы уже являетесь участником!');
         }
      }

      $presentation->participants()->attach($user->id);

      return back()->with('success', 'Вы успешно добавлены в список участников!');
   }
}
