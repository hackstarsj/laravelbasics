<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SimpleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if($request->get("id")==1){
            return $next($request);
        }
        else if($request->get("id")==2){
            return redirect(route("userhome"));
        }
        else{
            return response("Invalid ID");
        }
    }
}
