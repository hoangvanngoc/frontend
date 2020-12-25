<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkUserLogin
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
        // nếu user đã đăng nhập
        if(Auth::check()){
            $user = Auth::user();
            // nếu status = 1 thì cho qua
            if($user->status == 1){
                return $next($request);
            }else
            {
                Auth::logout();
                return redirect()->route('getLogin');
            }

    }else{
        return redirect()->route('getLogin');
    }
}
}
