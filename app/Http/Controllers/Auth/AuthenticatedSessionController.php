<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): Response // felhasználó bejelentkezési kérelmét kezeli egy API-ban.
                                                            //Autentikálja a felhasználót az adatbázisban tárolt adatok alapján, és validálja a bej adatokat
    {
        $request->validate([ //validálja a bejövő kérést. Ellenőrzi, hogy az email és password mezők meg vannak-e adva, és hogy az email egy érvényes e-mail cím formátumban van-e.
            'email' => ['required', 'string', 'email'],
                'password' => ['required', 'string'],
            ]);
            if (!Auth::attempt($request->only('email',  //Ha a hitelesítés sikertelen, visszaküld egy hibaüzenetet
                'password'))) {

                return response()->json(['message' => 
                'Invalid login credentials'], 401);        }

            $user = Auth::user(); //Ha a hitelesítés sikeres, az aktuálisan hitelesített felhasználót az Auth::user() metódus lekéri
        $token = $user->createToken('auth_token')->plainTextToken; //új auth_token nevű tokent generál a feh-nak
        return response()->json([ //Visszaküldi a létrehozott token-t, típusát és a fh adatait, sátutsz üzit h a bejelentkezés sikeres
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user_name' => $user,
                'status' => 'Login successful',
            ]);
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): Response //egyszerű kijelentkezési (logout) funkciót valósít meg az API-ban
    {
        $request->user()->currentAccessToken()->delete(); //Kijelentkezteti a felhasználót az aktuális hozzáférési token törlésével.
    	return response()->json(['message' => 'Logout successful']); //Értesíti a klienst a kijelentkezés sikerességéről egy JSON válaszban
    }
}
