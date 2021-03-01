<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Emoji\Emoji;

class AuthCheck
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
        if(!session()->has('LoggedAdmin') && ($request->path())!='login'){
            return redirect('/admin/login')->with('fail', 'Login dulu lur ' . Emoji::thinkingFace());
        }
        return $next($request);
    }
}
