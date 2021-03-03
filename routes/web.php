<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\PageController;
use App\Http\Middleware\SimpleMiddleware;

//Simple Route
Route::get("/page1",function(){
    return "Simple page1 Example";
});

//Simple Route With HTML Content
Route::get("/page2",function(){
    return "<h2>Simple Html Content</h2>";
})->name("page2");

//Simple Route With Param in URL
Route::get("/users/{id}",function($id){
    return "<h2>Hello User : </h2>".$id;
});

//Simple Route With Optional Param and Set Default Value in Param
Route::get("/usersexample2/{id?}",function($id=1){
    return "<h2>Hello User : </h2>".$id;
});

//Simple Route With Multiple Params
Route::get("/usersmultiparam/{id}/{name}",function($id,$name){
    return "<h2>Hello User : </h2>".$id." Name : ".$name;
});

//Group Of Url Which Call When User Access Url after /admin
Route::prefix("/admin")->group(function(){

    Route::get("/page1",function(){
        return "Page 1";
    });

    Route::get("/page2",function(){
        return "Page 2";
    });

});

//Route For 404 Pages
Route::fallback(function(){
    return "404 Page";
});

//Simple Route With POST Method
Route::post("/formsave",function(Request $request){
    return "Post Example";
});

//Simple Route With Any Types of Method
Route::any("/anymethod",function(){
    return "Work for Both Get and POST";
});

//Simple Route Linked With Controller 1st Way
Route::get("/page3","App\Http\Controllers\PageController@page3");

//Simple Route Linked With Controller 2nd Way
Route::get("/page4",[PageController::class,'page4']);

//Simple Route for Index Page Root Directory of site /
Route::get("","App\Http\Controllers\TemplateController@home");

//Simple Route With Route name So You Can Access Route Url by Name
Route::get("/userhome","App\Http\Controllers\TemplateController@userhome")->name("userhome");

// Simple Route Linked with Controller
Route::get("/userlogin","App\Http\Controllers\TemplateController@userlogin");

//Simple Route With Post Method Linked With Controller
Route::post("/userloginsave","App\Http\Controllers\TemplateController@userloginsave")->name('userloginprocess');

//Simple Route With Middleware Example
Route::get("/testMiddleware",function(){
    return "Simple Middleware Example";
})->middleware(SimpleMiddleware::class);


//Simple Route With Middleware Group Example
Route::middleware(SimpleMiddleware::class)->group(function(){
    Route::get("/testMiddlwareGroup1",function(){
        return "Simple Middlware Group 1";
    });
    Route::get("/testMiddlwareGroup2",function(){
        return "Simple Middlware Group 2";
    });
    Route::get("/testMiddlwareGroup3",function(){
        return "Simple Middlware Group 3";
    });
});

//Simple Route With Middleware Example Linked With Controller
Route::get('/testMiddlewareWithController',"App\Http\Controllers\TemplateController@testMiddlware")->middleware(SimpleMiddleware::class);

//Middleware With Registered Middleware Name Example
Route::get("/testMiddlewareWithName",function(){
    return "Simple Middleware With Name Middleware Example";
})->middleware("MyMiddleWare");