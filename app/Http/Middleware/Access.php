<?php

namespace App\Http\Middleware;

use Closure;

class Access {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

      switch($role){

        case 'admin':

        if(!\Auth::user()){

          if($request->ajax()){
            return response('Access Denied')->setStatusCode(403);
          }

          return redirect()->route('notrole');

        }else{

          if(!$request->user()->role){

            if($request->ajax()){
              return response('Access Denied')->setStatusCode(403);
            }
              
            return redirect()->route('notrole');
          }
          
        }
        
        break;
        default:
        return response('Access Denied')->setStatusCode(403);
        break;
      }

      return $next($request);
    }
}
