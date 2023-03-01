@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h2 class="text-center my-5">Search Results for "{{ $query }}"</h2>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3 class="my-3">Movies</h3>
        @if(count($movies) > 0)
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($movies as $movie)
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
        @else
            <p>No movies found.</p>
        @endif
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12">
        <h3 class="my-3">TV Shows</h3>
        @if(count($tvShows) > 0)
            <div class="d-flex flex-wrap justify-content-center">
                @foreach($tvShows as $show)
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
        @else
            <p>No TV shows found.</p>
        @endif
    </div>
</div>

</div>
@endsection

@section('styles')

<style>
    body {
        background: #140e1f;
        background: linear-gradient(135deg, #140e1f 0%, #41275c 100%);
        
    }

    .card {
        background-image: url('https://images.unsplash.com/photo-1528838224965-8b2b8c5b3997');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        
    }
    h2, h3{
        color: #ffffff;
    }
    .card:hover {
        box-shadow: 0px 0px 10px rgba(255, 255, 255, 