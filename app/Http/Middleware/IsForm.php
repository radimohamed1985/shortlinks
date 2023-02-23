<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Jenssegers\Agent\Facades\Agent;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

class IsForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
        // $device =Agent::isMobile();
        if(Agent::isMobile()|Agent::isAndroidOS()|Agent::isTablet()){
        // if(!Agent::isMobile()|!Agent::isAndroidOS()|!Agent::isTablet()){
            return $next($request);

        }
       $togo = config('settings.BotRedirectUrl');
        return redirect()->away($togo);

    }
}
