<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use Request;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if ($request->User()->isAdmin()) {
                return $next($request);
            } 
            else {
                //return response('Sorry!!! This Area is for Admin only.');
                return redirect('/');
            }


/*
        $id = Request::user()->id;
        $data = User::select()->where('id',$id)->get();
        if($data[0]->role == 'admin'){
            return $next($request);    
        }
        else{
            return response('Unauthorized.', 401);
        }
*/
    }
}
