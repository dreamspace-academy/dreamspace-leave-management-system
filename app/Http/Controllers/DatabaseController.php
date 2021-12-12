<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

class DatabaseController extends Controller
{
    public function InsertStaffData(Request $request){

      $session_type = Session::get('Session_Type');
      $session_value = Session::get('Session_Value');

      if($session_type == "Admin"){

        $this->validate($request, [
          'staff_id' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          'date_of_birth' => 'required',
          'email' => 'required',
          'phone_number' => 'required',
          'position' => 'required',
        ]);

        $staff_id       = $request->staff_id;
        $first_name     = $request->first_name;
        $last_name      = $request->last_name;
        $date_of_birth  = $request->date_of_birth;
        $email          = $request->email;
        $phone_number   = $request->phone_number;
        $position       = $request->position;


        if(DB::insert('INSERT INTO staff_data (staff_id, firstname, lastname, dob, email, phone_number, position) values (?, ?, ?, ?, ?, ?, ?)', [$staff_id, $first_name, $last_name, $date_of_birth, $email, $phone_number, $position])){

            return redirect()->back()->with('message', 'Registeration is Successful.');

        }

      }

    }

    public function DeleteStaffData($auto_id){

     $session_type = Session::get('Session_Type');

     if($session_type == "Admin"){


         if(DB::table('staff_data')->where('auto_id', '=', $auto_id)->delete()){

             return redirect()->back()->with('message', 'Deletion is Successful.');
         }

     }else{

         return Redirect::to("/");

     }

 }

}

?>
