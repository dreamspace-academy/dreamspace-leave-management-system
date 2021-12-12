<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

class PageController extends Controller
{
  public function ViewLoginPageController(){

      return view("login-page");

  }

  public function ViewHomePageController(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         return view("dashboard-content/home-page");

       }else if($session_type == "Staff"){

         return view("dashboard-content/home-page");

       }else{

         return Redirect::to("/");

       }
  }

  public function HandleLoginContoller(){

    Session::flush();
    return Redirect('/');

  }


}
