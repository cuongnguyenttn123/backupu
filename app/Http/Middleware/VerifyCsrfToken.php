<?php

namespace App\Http\Middleware;
use closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;
    public function handle($request, Closure $next)
    {
        $responce = $next($request);
        $responce->header('P3P', 'CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDI CONi HIS OUR IND CNT"');
        return $responce;
    }
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];
}
