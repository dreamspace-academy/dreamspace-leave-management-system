<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    public function HandleLoginContoller(Request $request){

        $this->validate($request, [
          'username' => 'required',
          'password' => 'required',
          'login_type' => 'required',
        ]);

        $user_entered_username    =    $request->username;
        $user_entered_password    =    $request->password;
        $user_entered_login_type  =    $request->login_type;


        $real_username      = "";
        $real_password      = "";
        $real_account_type  = "";

        $user = DB::select( DB::raw("SELECT username, password,account_type FROM user_account WHERE username ='$user_entered_username' AND account_type='$user_entered_login_type'"));

        foreach($user as $u){

         $real_username     =     $u->username;
         $real_password     =     $u->password;
         $real_account_type =     $u->account_type;

       }

       echo $real_password." ".$real_password." ".$real_account_type;
  }
}
