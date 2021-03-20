<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseExampleController extends Controller
{
    //

    public function simpleTextResponse(){
        return "Simple Text Response";
    }

    public function jsonResponseExample(){
        $user=array(
            array(
                "id"=>1,
                "name"=>"Rahul",
                "email"=>"Rahul@gmail.com",
                "skills"=>["php","java"]
                )
                ,
                array(
                    "id"=>2,
                    "name"=>"Rohit",
                    "email"=>"Rohit@gmail.com",
                    "skills"=>["php","python"]
                )
            );

        return $user; 
    }

    public function responseWithHeadersAndStatus(){
        //201 is HTTP STATUS  CODE
        return response("Simple Response With Headers and Status",201)
                ->header("Authorization","ABC")
                ->header("X-AUTH","SuperCoders");

    }

    public function redirectExampleWithFirstWay(){
        return redirect("/jsonResponseExample");
    }

    public function redirectExampleWithSecondWay(){
        return redirect(route("jsonRouteExample"));
    }

    public function redirectExampleWithThirdWay(){
        return redirect()->route("jsonRouteExample");
    }

    //Redirect to External Domain
    public function redirectExampleExternalURl(){
        return redirect()->away("https://google.com");
    }

    public function responseFormExample(){
        $data=array("title"=>"Simple Title","subtitle"=>"New Page");
        return view("responseFormExample")->with($data);
    }

    public function responseFormExamplePost(Request $request){
        //Passing Message to Template When Using Redirect 

        //Redirect With Message and Old Input
        if($request->input("personName")!="supercoders"){
            return redirect("/responseFormExample")->with("validation","Invalid Input")->withInput();
        }
        else{
            return "Processing Data";
        }
    }
}
