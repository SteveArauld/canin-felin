<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1);

        if (array_key_exists($locale, config('languages'))) {
            App::setLocale($locale);
        } else {
            $default = config('app.locale');
            return redirect($default . '/' . $request->path());
        }

        return $next($request);
    }
}
