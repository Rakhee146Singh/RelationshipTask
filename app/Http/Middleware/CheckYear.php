<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckYear
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $year)
    {
        if ($request->year > $year) {
            return response()->json([
                'message' => 'something went wrong'
            ]);
        }
        // dd($request->year);
        return $next($request);
    }
}
