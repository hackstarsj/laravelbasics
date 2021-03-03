<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;

class TemplateController extends Controller
{
    //
    public function home(){
        //Return Text Message to Browser
        //return "Home";

        //Return Template to User to Browse
        return view("home");
    }

    public function userhome(){
        return view("userspage.userhome");
    }

    public function userlogin(){
        return view("userspage.loginpage");
    }

    public function userloginsave(Request $request){
        //->input will work for both post and get method
        $username=$request->input("username");
        $password=$request->input("password");
        //->post will work for only post method
        $password=$request->post("password");
       // return "userloginsave Username : ".$username." Password : ".$password;

       //->away is used to redirect any url to user
       //return redirect()->away("https://google.com");

       //->route is used to redirect any route to user
       return redirect()->route("userhome");
    }

    public function testMiddlware(){
        return "Simple Middlware With Controller";
    }
}
