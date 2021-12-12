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

         return view("admin-dashboard-content/home-page");

       }else if($session_type == "Staff"){



       }else{

         return Redirect::to("/");

       }
  }

  public function ViewStaffManagementController(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff_data = DB::table('staff_data')->get(); // Get staff data.
         return view("admin-dashboard-content/staff-management")->with('staff_data', $staff_data); //Send staff data with it.

       }else{

         return Redirect::to("/");

       }

  }






}
