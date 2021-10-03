<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function create()
  {

    return view('ajax');
  }

  public function store(Request $request)
  {
      $request->validate([
          'name'          => 'required',
          'email'         => 'required',
          'subject' => 'required',
          'mobile_number' => 'required',
          'message'       => 'required',
      ]);

      #Create or update here
      return response()->json(['success'=>'Contact form submitted successfully']);
  }
}
