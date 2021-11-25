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

   public function create(Request $request)
   {
      // validation
      $request->validate([
         'moderator' => 'required',
         'start' => 'required',
         'end' => 'required',
         'audience' => 'required',
         'participants' => 'required|integer|min:10',
         'description' => 'required',
      ]);
      // create new user
      $activity = new Activity;
      $activity->moderator = $request->moderator;
      $activity->start = $request->start;
      $activity->end = $request->end;
      $activity->audience = $request->audience;
      $activity->participants_quantity = $request->participants;
      $activity->description = $request->description;
      $save = $activity->save();

      if ($save) {
         return back()->with('success', 'Вы успешно добавили новую мероприятию');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function update(Request $request)
   {
      // validation
      $request->validate([
         'moderator' => 'required',
         'start' => 'required',
         'end' => 'required',
         'audience' => 'required',
         'participants' => 'required|integer|min:10',
         'description' => 'required',
      ]);
      // create new user
      $activity = Activity::find($request->input('activity-id'));
      $activity->moderator = $request->moderator;
      $activity->start = $request->start;
      $activity->end = $request->end;
      $activity->audience = $request->audience;
      $activity->participants_quantity = $request->participants;
      $activity->description = $request->description;
      $save = $activity->save();

      if ($save) {
         return back()->with('success', 'Ваши изменения успешно сохранены');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function delete(Request $request)
   {
      $activity = Activity::find($request->input('activity-id'));

      $activity->trashed = true;
      $save = $activity->save();

      if ($save) {
         return redirect(route('dashboard.activities'))->with('success', 'Мероприятия успешно удалена!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function search(Request $request)
   {
      $keyword = $request->keyword;
      $activities = Activity::select('id', 'moderator', 'audience', 'description', 'trashed')
         ->where('trashed', false)
         ->where(function ($query) use ($keyword) {
            $query->where('moderator', 'like', '%' . $keyword . '%')
               ->orWhere('audience', 'like', '%' . $keyword . '%')
               ->orWhere('description', 'like', '%' . $keyword . '%');
         })->paginate(9);

      return view('dashboard.activities.search-result', compact('activities'));
   }
}
