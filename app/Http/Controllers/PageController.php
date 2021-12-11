<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Session;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{

  function ViewLoginPageController(){

    return view("login-page");

  }

}

?>
