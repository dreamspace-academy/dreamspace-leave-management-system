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


        if (DB::table('staff_data')->where('staff_id', $staff_id)->doesntExist()) {

          if(DB::insert('INSERT INTO staff_data (staff_id, firstname, lastname, dob, email, phone_number, position) values (?, ?, ?, ?, ?, ?, ?)', [$staff_id, $first_name, $last_name, $date_of_birth, $email, $phone_number, $position])){

              return redirect()->back()->with('message', 'Registeration is Successful.');

          }

        }else{
          return redirect()->back()->withErrors("<strong>Unable to register:</strong> The given staff ID already exists in the database");
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

   public function UpdateStaffData(Request $request){

      $session_type = Session::get('Session_Type');

      if($session_type == "Admin"){

        $this->validate($request, [
          'auto_id' => 'required',
          'first_name' => 'required',
          'last_name' => 'required',
          'date_of_birth' => 'required',
          'email' => 'required',
          'phone_number' => 'required',
          'position' => 'required',
        ]);

        $auto_id        = $request->auto_id;
        $first_name     = $request->first_name;
        $last_name      = $request->last_name;
        $date_of_birth  = $request->date_of_birth;
        $email          = $request->email;
        $phone_number   = $request->phone_number;
        $position       = $request->position;


        if(DB::table('staff_data')->where('auto_id', $auto_id)->update(['firstname' => $first_name, 'lastname' => $last_name, 'dob' => $date_of_birth, 'email' => $email, 'phone_number' => $phone_number, 'position' => $position])){

          return Redirect::to("/view-staff-management-index")->with('message', 'Updation is Successful.');

        }else{

          return Redirect::to("/view-staff-management-index")->with('message', 'No changes made.');
        }

      }else{

          return Redirect::to("/");

      }

  }


  public function ChangeUsername(Request $request){

     $session_type = Session::get('Session_Type');

     if($session_type == "Admin"){

        $admin_data = DB::table('user_account')->where("account_type", "admin")->get(); // Get staff data.

        if($request->password == $admin_data[0]->password){

          if(DB::table('user_account')->where('account_type', 'admin')->update(['username'=>$request->username])){

              return redirect()->back()->with('message', 'Username has been updated successfully.');

          }else{

            return redirect()->back()->with('message', 'No changes made.');

          }


        }else{

          return redirect()->back()->withErrors('The password is wrong.');
        }

     }else{

         return Redirect::to("/");

     }

 }


 public function ChangePassword(Request $request){

    $session_type = Session::get('Session_Type');

    if($session_type == "Admin"){

       $admin_data = DB::table('user_account')->where("account_type", "admin")->get(); // Get staff data.

       if($request->current_password == $admin_data[0]->password){

         if($request->new_password == $request->confirm_password){

           if(DB::table('user_account')->where('account_type', 'admin')->update(['password'=>$request->new_password])){

               return redirect()->back()->with('message', 'Password has been updated successfully.');

           }else{

             return redirect()->back()->with('message', 'No changes made.');

           }

         }else{

           return redirect()->back()->withErrors('The confirm password does not match');

         }

       }else{

         return redirect()->back()->withErrors('The current password is wrong.');
       }

    }else{

        return Redirect::to("/");

    }

}

}

?>
