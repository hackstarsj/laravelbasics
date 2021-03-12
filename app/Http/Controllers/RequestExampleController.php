<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestExampleController extends Controller
{
    //

    public function requestExample(Request $request){

        //Url Return Only Url not Parameter
        $data="URL : ".$request->url()."<br>";

        $data.="PATH : ".$request->path()."<br>";

        //Full Url Return Url With Parameter
        $data.="FULL URL : ".$request->fullUrl()."<br>";

        return "Request Example Tutorial" ."<br>".$data;
    }

    public function requestExampleForm(Request $request){
        //Access Value from Parameter Using Query in Get Method
        $id=$request->query("id");
        echo $id;
        return view("requestFormExample");
    }

    public function requestExampleFormSave(Request $request){

        //Access All Headers in Associative Array
        echo "<pre>";
        echo "==============ALL HEADERS FROM REQUEST OBJECT============<br>";
        print_r($request->header());
        echo "==============END HEADERS FROM REQUEST OBJECT============<br>";
        
        //Get User Agent From Header
        echo "==============USER AGENT FROM HEADER FROM REQUEST OBJECT============<br>";
        echo $request->header("user-agent");
        echo "==============END USER AGENT FROM HEADER FROM REQUEST OBJECT============<br>";

        //Check Header Had Key Exist Or Not
        if($request->hasHeader("connection")){
            echo "<br>Connection Exist<br>";
        }
        else{
            echo "<br>Connection Doesn't Exist<br>";
        }

        //Access IP Address Of User
        $ip=$request->ip();
        echo "<br>IP Address : ".$ip."<br>";



        //Access All Form Input Data
        $all_data=$request->all();
        echo "<br>";
        print_r($all_data);
        echo "<br>";

        //Get Default Value from Request
        $age=$request->input('age',19);
        echo "<br>";
        echo "AGE : ".$age;
        echo "<br>";

        //Access Form Input Data
        $name=$request->input("personName");
        if($request->isMethod("post")){
            echo "POST METHOD";
        }

        //Access HTML Array Inputs
        $products=$request->input("products");
        echo "<br> Products";
        print_r($products);
        echo "<br>";

        //Access Single Item first Way
        echo "<br> ITEM 1 : ".$request->input("products.0")."<br>";
        //Access Single Item Second Way
        echo "<br> ITEM 1 : ".$products[0]."<br>";

        return "Save Form Data Name : ".$name;
    }

    public function requestAny(Request $request){
        if($request->isMethod("get")){
            echo "GET METHOD";
        }
        if($request->isMethod("post")){
            echo "POST METHOD";
        }
        if($request->isMethod("put")){
            echo "PUT METHOD";
        }
        if($request->isMethod("head")){
            echo "HEAD METHOD";
        }
        if($request->isMethod("delete")){
            echo "DELETE METHOD";
        }
    }

    public function requestExampleFormSave2(Request $request){
        //Check Email Coming from FORM
        // if($request->has("email")){
        //     echo "EMAIL EXIST";
        // }
        // else{
        //     echo "EMAIL NOT EXIST";
        // }

        //Access File Data and Save File
        $path=$request->file("profile")->store("image");
       //GET FILE PATH in $path
        // echo "File PATH : ".$path."<br>";

        
        //Access File Data and Save File by Own NAME
        $path=$request->file("profile")->storeAs("image","Arijit.jpg");
        //GET FILE PATH in $path
       // echo "File PATH : ".$path."<br>";

        //print_r($request->file("profile"));

        //Generally We Use OlD Data to Check Validation Condition Show that We Show OlD Data in FORM AGAIN
        
        //For All VALUE
        return redirect(route("requestExampleForm"))->withInput();

        //FOR EXCEPT SOME VALUES
        return redirect(route("requestExampleForm"))->withInput(
            $request->except("password")
        );
    }
}
