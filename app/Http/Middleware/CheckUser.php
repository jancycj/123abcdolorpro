<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Auth;

class CheckUser
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

        $user = User::where('id',Auth::id())->with('roles')->first();
        
        $role = $user->roles[0]->name;
        // session()->put('role',$role);

        if($role == 'admin'){
            return $next($request);
        }
        return redirect()->back();
        
        
    }
}
