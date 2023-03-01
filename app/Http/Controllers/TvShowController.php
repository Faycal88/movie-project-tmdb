<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Comment;
use GuzzleHttp\Client;

class TvShowController extends Controller
{

    

    public function index()
    {
        //get popular movies list from TMDB
        $client = new Client(['base_uri' => 'http://api.themoviedb.org/3/']);
        $response = $client->request('GET', 'tv/popular', [
            'query' => [
                'api_key' => env('TMDB_API_KEY'),
            ],
        ]);
        $movies = json_decode($response->getBody()->getContents(), true)['results'];

        $k = array_rand($movies);
        $rand = $movies[$k];

        
        //get one random movie from the previous popular movies array and fetch it's trailer video
        $clientb = new Client();
        $responseb = $clientb->get('http://api.themoviedb.org/3/tv/'.$rand['id'].'?api_key='.env('TMDB_API_KEY').'&append_to_response=videos');
        $movie = json_decode($responseb->getBody(), true);
    
        if(!isset($movie['videos']['results'][0]['key'])) {
            $movie['videos']['results'][0]['key'] = null;
        }

        $trailer = $movie['videos']['results'][0]['key'];
        $movie['trailer'] = $trailer;
        
        
        $production_companies = $movie['production_companies'][0];
      /*   dd($production_companies); */

        //get upcoming movies from TMDB
        $clientc = new Client(['base_uri' => 'http://api.themoviedb.org/3/']);
        $responsec = $clientc->request('GET', 'tv/airing_today', [
            'query' => [
                'api_key' => env('TMDB_API_KEY'),
            ],
        ]);
        $upcoming = json_decode($responsec->getBody()->getContents(), true)['results'];


        //get top_rated movies from TMDB
        $clientd = new Client(['base_uri' => 'http://api.themoviedb.org/3/']);
        $responsed = $clientd->request('GET', 'tv/top_rated', [
            'query' => [
                'api_key' => env('TMDB_API_KEY'),
            ],
        ]);

     

        $latest = json_decode($responsed->getBody()->getContents(), true)['results'];

        $s = array_rand($latest);
        $random = $latest[$s];
       

        return view('tvshow.index', compact('movies','movie','production_companies','upcoming','latest','random'));
    }

    public function show(Request $r)
    {   
        $id = $r->id;

       
        $client = new Client();
        $response = $client->get('http://api.themoviedb.org/3/tv/'.$id.'?api_key='.env('TMDB_API_KEY').'&append_to_response=videos');

        $movie = json_decode($response->getBody(), true);

        // Get comments from TMDB API
        $response = Http::get('http://api.themoviedb.org/3/tv/' . $id . '/reviews', [
            'api_key' => env('TMDB_API_KEY'),
        ]);
        $tmdb_comments = $response->json()['results'];

        // Get comments from SQL database
        $user_comments = Comment::join('users', 'comments.user_id', '=', 'users.id')
    ->where('comments.movie_id', $id)
    ->orderBy('comments.created_at', 'desc')
    ->get(['comments.*', 'users.name']);
        
       
        if(!isset($movie['videos']['results'][0]['key'])) {
            $movie['videos']['results'][0]['key'] = null;
        }
        
    
        $trailer = $movie['videos']['results'][0]['key'];
        
        $movie['trailer'] = $trailer;
        return view('movies.movie', [
            'id'=> $movie['id'],
            'title' => $movie['name'],
            'release_date' => $movie['first_air_date'],
            'overview' => $movie['overview'],
            'vote_average' => $movie['vote_average'],
            'trailer' => $movie['trailer'],
            'tmdb_comments' => $tmdb_comments,
            'user_comments' => $user_comments,
        ]);
    }

    public function store(Request $r, $id)
    {
       /*  dd($id); */

        $validatedData = $r->validate([
            'content' => 'required',
        ]);

        
    
        $comment = new Comment;
        $comment->body = $validatedData['content'];
        $comment->user_id = auth()->user()->id;
        $comment->movie_id = $id;

        

        $comment->save();
    
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function getTmdbComments($id)
    {
        $response = Http::get('http://api.themoviedb.org/3/movie/' . $id . '/reviews', [
            'api_key' => env('TMDB_API_KEY'),
        ]);
        return $response->json()['results'];
    }

    public function getUserComments($id)
    {
        return Comment::where('movie_id', $id)->orderBy('created_at', 'desc')->get();
    }
    
}
