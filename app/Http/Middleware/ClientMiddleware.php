<?php

namespace App\Http\Middleware;

use Closure;

class ClientMiddleware
{
    /**
     * 前台科研服务客户管理中间件
     *
     */
    public function handle($request, Closure $next)
    {
        //中间件检查session中有没有
        if (session('home_client')) {
            // ok 通过 进行下次请求
            return $next($request);
        }else{
            return redirect('/research/logon');
        }
    }
}
