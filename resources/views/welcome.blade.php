@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Welcome to our Movies & TV Shows app!</h1>
                    <p class="lead">Browse the latest movies and TV shows, watch their trailers, and leave comments.</p>
                    <hr class="my-4">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="d-flex" action="{{ route('search') }}" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
            </div>
        </div>

        @if(isset($results))
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2 class="text-center my-5">Search Results</h2>
                    <div class="d-flex flex-wrap justify-content-center">

                        {{-- {{ dd($results) }} --}}
                        
                        @foreach($results as $movie)
                            @if($movie['media_type'] === 'movie')
                            <div class="card mb-4 mx-2" style="width: 18rem;">
                                <a href="{{ route('movies.show', $movie['id']) }}">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $movie['title'] }}</h5>
                                    <p class="card-text">{{ $movie['overview'] }}</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-primary">Watch Trailer</a>
                                </div>
                            </div>
                            @elseif($movie['media_type'] === 'tv')
                            <div class="card m-2" style="width: 18rem;">
                                <a href="{{ route('tvshows.show', $movie['id']) }}">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['name'] }}">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $movie['name'] }}</h5>
                                    <p class="card-text">{{ $movie['overview'] }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a href="{{ route('tvshows.show', $movie['id']) }}" class="btn btn-primary">Watch Trailer</a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                       
                        
                    </div>
                </div>
            </div>
        @else
    

        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center my-5">Latest Movies</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($latestMovies as $movie)
                        <div class="card mb-4 mx-2" style="width: 18rem;">
                            <a href="{{ route('movies.show', $movie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500'.$movie['poster_path'] }}" class="card-img-top" alt="{{ $movie['title'] }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $movie['title'] }}</h5>
                                <p class="card-text">{{ $movie['overview'] }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-primary">Watch Trailer</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="text-center my-5">Latest TV Shows</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    @foreach($latestTVShows as $show)
                        <div class="card m-2" style="width: 18rem;">
                            <a href="{{ route('tvshows.show', $show['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500'.$show['poster_path'] }}" class="card-img-top" alt="{{ $show['name'] }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $show['name'] }}</h5>
                                <p class="card-text">{{ $show['overview'] }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-center">
                                <a href="{{ route('tvshows.show', $show['id']) }}" class="btn btn-primary">Watch Trailer</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    @endif
@endsection

@section('styles')
<style>
    body {
        background: #140e1f;
        background: linear-gradient(135deg, #140e1f 0%, #41275c 100%);
        
    }

    .jumbotron {
        background-image: url('https://images.unsplash.com/photo-1521939096475-0936d327c9c7');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        color: #ffffff;
    }

    .card {
        background-image: url('https://images.unsplash.com/photo-1528838224965-8b2b8c5b3997');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    h2{
        color: #ffffff;
    }
    .card:hover {
        box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
    }

    .list-group-item {
        border: none;
        border-radius: 0;
        transition: transform 0.2s ease-in-out;
    }

    .list-group-item:hover {
        transform: scale(1.05);
        box-shadow: 0px 0px 10px rgba(255, 255, 255, 0.2);
    }
</style>
@endsection

       

