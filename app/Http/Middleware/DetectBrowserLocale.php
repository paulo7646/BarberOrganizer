<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;

class DetectBrowserLocale
{
    public function handle(Request $request, Closure $next)
    {
        $available = config('localization.supported_locales', ['pt_BR', 'en', 'es']);

        // Lê as linguagens do navegador
        $browserLocales = $request->getLanguages();

        foreach ($browserLocales as $bl) {
            $normalized = str_replace('-', '_', $bl);
            if (in_array($normalized, $available, true)) {
                App::setLocale($normalized);
                Carbon::setLocale($normalized);
                return $next($request);
            }
        }

        // Tenta só pela primária
        foreach ($browserLocales as $bl) {
            $primary = substr($bl, 0, 2);
            foreach ($available as $avail) {
                if (str_starts_with($avail, $primary)) {
                    App::setLocale($avail);
                    Carbon::setLocale($avail);
                    return $next($request);
                }
            }
        }

        // Fallback
        $fallback = config('app.locale', 'en');
        App::setLocale($fallback);
        Carbon::setLocale($fallback);

        return $next($request);
    }
}
