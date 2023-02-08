<?php

namespace Phobrv\Frontend\Middleware;

use Closure;
use Illuminate\Http\Request;
use Phobrv\BrvCore\Services\UnitServices as UnitServices;

class Redirect301Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $redirect301_content = UnitServices::readFile(config('brvcore.redirect301_file'));
        $redirect301_content = trim(preg_replace('/\s\s+/', ' ', $redirect301_content));
        $cur_url = strtok($request->getUri(), '?');
        $json_data = json_decode($redirect301_content);

        if (! empty($json_data->$cur_url)) {
            return redirect($json_data->$cur_url, 301);
        }

        return $next($request);
    }
}
