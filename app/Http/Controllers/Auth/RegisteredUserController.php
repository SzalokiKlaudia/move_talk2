<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ForumComment;
use App\Models\ForumTopic;
use App\Models\User;
use App\Models\UserMovie;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json([
            "users" => User::all()
        ], 200);
    }

    public function destroy($id): JsonResponse
    {
        User::destroy($id);
        return response()->json([
            "messsage" => "User deleted"
        ], 200);
    }

    
    public function destroyTopic($id): JsonResponse
    {
        ForumComment::where('forum_topic_id', $id)->delete();
        ForumTopic::destroy($id);
        return response()->json([
            "messsage" => "Topic deleted"
        ], 200);
    }

      
    public function destroyComment($id): JsonResponse
    {
        ForumComment::destroy($id);
        return response()->json([
            "messsage" => "Comment deleted"
        ], 200);
    }

    public function storeTopic(Request $request): JsonResponse
    {
        $user = Auth::user();

        $topic = new ForumTopic();
        $topic->user_id = $user->id;
        $topic->title = $request->title;
        $topic->save();

        return response()->json([
            "message" => "Topic created"
        ], 200);
    }

    public function storeComment(Request $request): JsonResponse
    {
        $user = Auth::user();

        $topic = new ForumComment();
        $topic->forum_topic_id = $request->forum_topic_id;
        $topic->user_id = $user->id;
        $topic->comment = $request->comment;
        $topic->save();

        return response()->json([
            "message" => "Comment created"
        ], 200);
    }

    public function indexMovies(): JsonResponse
    {
        $user = Auth::user();
        
        return response()->json([
            "data" => User::with('userMovies')->find($user->id)
        ], 200);
    }

    public function indexComment(): JsonResponse
    {
        $user = Auth::user();
        
        return response()->json([
            "data" => User::with('forumComments')->find($user->id)
        ], 200);
    }

    public function indexTopic(): JsonResponse
    {
        $user = Auth::user();
        
        return response()->json([
            "data" => User::with('forumTopics')->find($user->id)
        ], 200);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'birth_year' => ['required', 'integer'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'birth_year' => $request->birth_year,
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
