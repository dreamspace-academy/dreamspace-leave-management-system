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

      return view("dashboard-content/home-page");

  }
}
