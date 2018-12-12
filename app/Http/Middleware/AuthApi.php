<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthApi extends Authenticate
{
    protected function authenticate($request, array $guards)
    {
        // var_dump($request);
        // print_r($guards);
        // exit;
        if ($this->auth->guard('api')->check()) {
            return $this->auth->shouldUse('api');
        }
        
        throw new UnauthorizedHttpException('', 'Unauthenticated');
    }
}