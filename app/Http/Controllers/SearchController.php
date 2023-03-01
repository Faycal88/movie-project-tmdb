<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request)
{
    // Get the search query from the request
    $query = $request->input('query');

    // Search for movies and TV shows with the query using the TMDB API
    $results = Http::get('http://api.themoviedb.org/3/search/multi', [
        'api_key' => env('TMDB_API_KEY'),
        'query' => $query,
    ])->json()['results'];

    $latestMovies = Http::get('http://api.themoviedb.org/3/movie/popular', [
        'api_key' => env('TMDB_API_KEY')
    ])->json()['results'];

    $latestTVShows = Http::get('http://api.themoviedb.org/3/tv/popular', [
        'api_key' => env('TMDB_API_KEY')
    ])->json()['results'];

    
    return view('welcome', compact('latestMovies','latestTVShows','results'));
}
}
