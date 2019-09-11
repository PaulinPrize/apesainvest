<?php

namespace App\Http\Middleware;

use Closure;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Votre compte a été suspendu. S\'il vous plaît contacter l\'administrateur.';
            } else {
                $message = 'Votre compte a été suspendu pour '.$banned_days.' '.str_plural('jour', $banned_days).'. S\'il vous plaît contacter l\'administrateur.';
            }

            return redirect()->route('login')->withMessage($message);
        }

        return $next($request);
    }
}
