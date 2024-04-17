<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        Carbon::setLocale('es'); // Establece el idioma a español
        Carbon::setToStringFormat('Y-m-d H:i:s'); // Establece el formato de fecha y hora

        return $next($request);
    }
}
