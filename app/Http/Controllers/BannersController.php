<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannersController extends Controller
{
   public function search(Request $request)
   {
      $keyword = $request->keyword;
      $banners = Banner::where('trashed', false)->where('title', 'like', '%' . $keyword . '%')->paginate(9);

      return view('dashboard.banners.search-result', compact('banners'));
   }

   public function create(Request $request)
   {
      // validation
      $request->validate([
         'banner' => 'required|file|max:200',
         'title' => 'required',
      ]);

      $banner = new Banner;

      $file = $request->file('banner');
      $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
      $path = public_path('img/banners');
      $file->move($path, $fileName);
      $banner->img = $fileName;
      $banner->title = $request->title;
      $save = $banner->save();

      if ($save) {
         return back()->with('success', 'Вы успешно добавили новый баннер!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function update(Request $request)
   {
      // validation
      $request->validate([
         'banner' => 'file|max:200',
         'title' => 'required',
      ]);

      $banner = Banner::find($request->input('banner-id'));

      if ($request->file('banner')) {
         $file = $request->file('banner');
         $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

         $path = public_path('img/banners/' . $banner->img);
         if (file_exists($path)) {
            unlink($path);
         }

         $path = public_path('img/banners');
         $file->move($path, $fileName);
         $banner->img = $fileName;
      }

      $banner->title = $request->title;
      $save = $banner->save();

      if ($save) {
         return back()->with('success', 'Баннер успешно изменен!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function delete(Request $request)
   {
      $banner = Banner::find($request->input('banner-id'));

      $banner->trashed = true;
      $save = $banner->save();

      if ($save) {
         return redirect(route('dashboard.banners'))->with('success', 'Баннер успешно удален!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }
}
