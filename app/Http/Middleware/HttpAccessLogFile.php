<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HttpAccessLogFile
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
        $request->start = microtime(true);

        return $next($request);
    }

    public function terminate($request, $response)
    {
        $request->end = microtime(true);
        $this->log($request,$response);
    }

    protected function log($request,$response)
    {
        $log  = [];
        $log['ip'] = $request->getClientIp();
        $log['method'] = $request->getMethod();
        $log['url'] = $request->fullUrl();
        $log['duration'] = $request->end - $request->start;
        $log['request_body'] = $request->all();
        $log['response'] = $response->getContent();
        // Log::info(json_encode($log,JSON_UNESCAPED_UNICODE));
        Log::channel('http')->log('info',json_encode($log,JSON_UNESCAPED_UNICODE));
    }
}
