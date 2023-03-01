<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        /* $response = Http::get('http://api.themoviedb.org/3/movie/popular', [
            'api_key' => env('TMDB_API_KEY')
        ])->json();
        
        dd($response); */

        $latestMovies = Http::get('http://api.themoviedb.org/3/movie/popular', [
            'api_key' => env('TMDB_API_KEY')
        ])->json()['results'];

        $latestTVShows = Http::get('http://api.themoviedb.org/3/tv/popular', [
            'api_key' => env('TMDB_API_KEY')
        ])->json()['results'];

        return view('welcome', compact('latestMovies', 'latestTVShows'));
    }
}