<?php

namespace App\Http\Middleware;

use Closure;

class HomeMiddleware
{
    /**
     * 后台登入中间件
     *
     */
    public function handle($request, Closure $next)
    {
        //后台中间件检查session中有没有admin
        if (session('home_user')) {
            // ok 通过 进行下次请求
            return $next($request);
        }else{
            return redirect('/home_user/login');
        }
    }
}
