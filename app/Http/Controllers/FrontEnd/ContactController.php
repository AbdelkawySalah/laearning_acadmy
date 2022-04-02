<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
class ContactController extends Controller
{
    public function index()
    {
      $data['settings']=Setting::first();
    //   return  $data['settings'];
      return view('front.contact.index')->with($data);
    }
}
