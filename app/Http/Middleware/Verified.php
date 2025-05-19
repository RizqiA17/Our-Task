<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Verified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(User::where('email', $request->user()->email)->where('email_verified_at', null)->exists()) {
            return response()->json(['error' => 'Email not verified'], 401);
        }
        return $next($request);
    }
}
