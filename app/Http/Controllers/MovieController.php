<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();  // Az összes film lekérése az adatbázisból
        return response()->json($movies);  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show($id) //id alapján megtalál 1 filmet
    {
        $movie = Movie::find($id);

       
        if (!$movie) {
            return response()->json([
                'message' => 'Movie not found'
            ], 404);
        }
        return response()->json($movie, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
