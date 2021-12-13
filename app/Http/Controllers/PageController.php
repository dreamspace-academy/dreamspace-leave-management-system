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

  public function ViewStaffManagementIndexController(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff_data = DB::table('staff_data')->get(); // Get staff data.
         return view("admin-dashboard-content/staff-management-page-1-index")->with('staff_data', $staff_data); //Send staff data with it.

       }else{

         return Redirect::to("/");

       }

  }

  public function ViewStaffManagementEditController($auto_id){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff_data = DB::table('staff_data')->where("auto_id", $auto_id )->get(); // Get staff data.
         return view("admin-dashboard-content/staff-management-page-2-edit")->with('staff_data', $staff_data); //Send staff data with it.

       }else{

         return Redirect::to("/");

       }

  }

  public function ViewSettingsPageContoller(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $admin_data = DB::table('user_account')->where("account_type", "admin")->get(); // Get staff data.
         return view("admin-dashboard-content/settings-page-1-index")->with('admin_data', $admin_data); //Send staff data with it.

       }else{

         return Redirect::to("/");

       }

  }



  public function ViewUserAccountsIndexContoller(){

       $session_type = Session::get('Session_Type');
       $session_value = Session::get('Session_Value');

       if($session_type == "Admin"){

         $staff_data = DB::select("SELECT DISTINCT staff_data.staff_id, staff_data.firstname, staff_data.lastname FROM staff_data, user_account WHERE staff_data.staff_id != user_account.staff_id"); // SQL-CODE
         $staff_user_data = DB::table('user_account')->where("account_type", "staff")->get(); // Get staff data.

         return view("admin-dashboard-content/user-accounts-page-1-index")->with(['staff_user_data' => $staff_user_data, "staff_data" => $staff_data]); //Send staff data with it.

       }else{

         return Redirect::to("/");

       }

  }

}
