<?php

namespace App\Http\Middleware;

use App\Models\SiteSetting;
use Closure;
use Illuminate\Http\Request;

class ShareSettingsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Site ayarlarını paylaş
        view()->share('settings', SiteSetting::first());
        
        return $next($request);
    }
}