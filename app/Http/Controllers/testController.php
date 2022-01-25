<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function test()
    {
        dd("hello");
    }
    public function getCookie(Request $request) {
      $value = $request->cookie('name');
      echo $value;
      echo "1";
        dd("get cokie");
   }
}
