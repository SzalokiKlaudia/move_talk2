<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->string('password')),
        ]);

        event(new Registered($user));
        //két dolgot csinál az alábbi kőd:
        // Létrehoz egy API hozzáférési tokent a felhasználó ($user) számára
        //Visszaadja a tokent, a token típusát bearer, és a fh-i adatokat egy json válaszban!!

        $token = $user->createToken('auth_token')->plainTextToken; //Létrehoz egy új API token-t a megadott auth_token névvel. 
           //A Laravel Sanctum csomagot használja az egyszerű token-alapú API autentikációhoz.
           // ->plainTextToken: A létrehozott token plain text formátumú verzióját adja vissza, amelyet az ügyfél az API hívások során használhat.
        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user_name' => $user
        ]);
        
    }
}
