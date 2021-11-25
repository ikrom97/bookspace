<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
   public function create(Request $request)
   {
      $company = new Company;
      $company->title = $request->title;
      $save = $company->save();

      if ($save) {
         return redirect(route('dashboard.companies'))->with('success', 'Компания успешно добавлена!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function update(Request $request)
   {
      $company = Company::find($request->input('company-id'));
      $company->title = $request->title;
      $save = $company->save();

      if ($save) {
         return redirect(route('dashboard.companies'))->with('success', 'Ваши изменения успешно сохранены!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }

   public function delete(Request $request)
   {
      $company = Company::find($request->input('company-id'));

      $company->trashed = true;
      $save = $company->save();

      if ($save) {
         return redirect(route('dashboard.companies'))->with('success', 'Компания успешно удалена!');
      } else {
         return back()->with('fail', 'Что-то пошло не так попробуте позже!');
      }
   }
}
