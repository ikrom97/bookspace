<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
   public function participate(Request $request)
   {
      $user = User::find(session('loggedUser'));

      $activity = Activity::where('trashed', false)->find($request->id);

      foreach ($activity->participants as $participant) {
         if ($participant->id == $user->id) {
            return back()->with('fail', 'Вы уже являетесь участником!');
         }
      }

      $activity->participants()->attach($user->id);

      return back()->with('success', 'Вы успешно добавлены в список участников!');
   }
}
