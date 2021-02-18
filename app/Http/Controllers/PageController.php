<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function page3(){
        return "Simple Page Example Linked to Route to Controller";
    }

    public function page4(){
        return "Simple Page Example Linked to Route to Controller Alternate Way";
    }
    
}
