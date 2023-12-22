<?php

namespace App\Http\Middleware;


use Monobill\MonobillPhpSdk\MonoBillAPI;

class VerifyMonoBillRequest
{

    public function handle($request, \Closure $next)
    {

        $api = new MonoBillAPI(config('monobill.id'), config('monobill.secret'));

        if(!$api->verifyRequest())
        {
            die('This is only accessible from within MonoBill.');
        }

        return $next($request);
    }
}
