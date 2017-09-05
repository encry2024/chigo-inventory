<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
* Class FrontendController.
*/
class FrontendController extends Controller
{
   /**
   * @return \Illuminate\View\View
   */
   public function index()
   {
      return redirect('admin/dashboard');
   }

   /**
   * @return \Illuminate\View\View
   */
   public function macros()
   {
      return view('frontend.macros');
   }
}
