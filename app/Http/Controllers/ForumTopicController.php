<?php

namespace App\Http\Controllers;

use App\Models\ForumTopic;
use Illuminate\Http\Request;

class ForumTopicController extends Controller
{
    public function index()  //összes fórum téma lekérése
    {
       
        $topics = ForumTopic::all();

        return response()->json($topics, 200);
    }
}
