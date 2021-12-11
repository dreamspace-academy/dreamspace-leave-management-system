<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function HandleLoginContoller(Request $request){

        $this->validate($request, [
          'username' => 'required',
          'password' => 'required',
          'login_type' => 'required',
        ]);

        $user_entered_username =    $request->username;
        $user_entered_password =    $request->password;
        $user_entered_login_type =  $request->login_type;

        echo $user_entered_password." ".$user_entered_password." ".$user_entered_login_type;

  }
}
