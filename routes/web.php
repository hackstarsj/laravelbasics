<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\PageController;

Route::get("/page1",function(){
    return "Simple page1 Example";
});

Route::get("/page2",function(){
    return "<h2>Simple Html Content</h2>";
})->name("page2");

Route::get("/users/{id}",function($id){
    return "<h2>Hello User : </h2>".$id;
});

Route::get("/usersexample2/{id?}",function($id=1){
    return "<h2>Hello User : </h2>".$id;
});

Route::get("/usersmultiparam/{id}/{name}",function($id,$name){
    return "<h2>Hello User : </h2>".$id." Name : ".$name;
});


Route::prefix("/admin")->group(function(){

    Route::get("/page1",function(){
        return "Page 1";
    });

    Route::get("/page2",function(){
        return "Page 2";
    });

});

Route::fallback(function(){
    return "404 Page";
});

Route::post("/formsave",function(Request $request){
    return "Post Example";
});

Route::any("/anymethod",function(){
    return "Work for Both Get and POST";
});

Route::get("/page3","App\Http\Controllers\PageController@page3");
Route::get("/page4",[PageController::class,'page4']);


