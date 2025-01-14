<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Moderator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || !(Auth::user()->role === 2)) {
            //Auth::check(): Ellenőrzi, hogy a felhasználó be van-e jelentkezve.
            //Auth::user()->role === 2: Ellenőrzi, hogy a bejelentkezett felhasználó modeartor-e
            return response()->json(['message' => 'Access denied. Users only.'], 403);
            //Ez egy JSON választ küld vissza 403 Forbidden státuszkóddal és egy "Unauthorized" üzenettel.
        }
        //Ha a felhasználó bejelentkezett, akkor:
        return $next($request); //folytatódhat a kérés
        //A $next($request) meghívásával a kérés továbbadódik a következő middleware-nek vagy a vezérlőnek.
    }
}
