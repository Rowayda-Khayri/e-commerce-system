<?php

namespace App\Http\Middleware;

use Closure;
use \App\User;


use Illuminate\Support\Facades\Auth;

class CheckUserStatus
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
        $authedUserID = Auth::id();
        
//        dd($authedUserID);
        $user = User::query()
               ->where('id',$authedUserID)
               
//               ->get(['users.status as status'])
               ->get(['users.status'])
                ->first();
        
//        dd($user);
        
        if ($user->status != 1)
        {  //inactive user
            
            return redirect('/forbidden');
        }

        return $next($request);
    }
}
