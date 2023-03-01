@extends('layouts.show')

<style>
    body {
        background-color: #1c1c1c;
        color: #fff;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
    }

    .movie-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin: 50px auto;
       
    }

    .movie-trailer {
        flex-basis: 50%;
        margin-right: 20px;
    }

    .movie-trailer iframe {
        width: 100%;
        height: 400px;
    }

    .movie-info {
        flex-basis: 50%;
    }

    .movie-info h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .movie-info p {
        margin-bottom: 10px;
    }

    .movie-info strong {
        font-weight: bold;
    }
    .comments-container {
        margin-top: 50px;
    }

    .comments-form {
        margin-top: 20px;
    }

    .comments-form label {
        display: block;
        margin-bottom: 5px;
    }

    .comments-form input[type="submit"] {
        margin-top: 10px;
        background-color: #0066cc;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        cursor: pointer;
    }

    .comments-list {
        margin-top: 20px;
    }

    .comment {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #7d7c7c;
    }

    .comment p {
        margin-bottom: 5px;
    }

    .comment span {
        font-size: 1.1rem;
        color: #000000;
    }
    textarea{
        width: 100%;
        min-height: 15em;
    }
    
</style>

@section('content')
    

<div class="movie-container">
    <div class="movie-trailer">
        <iframe src="http://www.youtube.com/embed/{{$trailer}}?enablejsapi=1" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="movie-info">
        <h2>{{ $title }}</h2>
        <p><strong>Release Date:</strong> {{ $release_date }}</p>
        <p><strong>Overview:</strong> {{ $overview }}</p>
        <p><strong>Rating:</strong> {{ $vote_average }}</p>
    </div>
</div>

<!-- Add new comment form for authenticated users -->
@auth
    <form class="comments-form" method="POST" action="{{ route('comments.store', $id) }}">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $id }}">
        <label for="content">Add a comment:</label>
        <textarea  name="content" id="content" rows="4" required></textarea>
        <input type="submit" value="Add Comment">
    </form>
@else
    <p>Please <a href="{{ route('login') }}">login</a> to add a comment.</p>
@endauth

<div class="comments-container">
    <h3>Comments</h3>

    <!-- Display comments from TMDB -->
    @if (count($tmdb_comments) > 0)
        <div class="comments-list">
            @foreach ($tmdb_comments as $comment)
                <div class="comment">
                    <p>{{ $comment["content"] }}</p>
                    <span>Author : {{ $comment["author"] }}</span>
                </div>
            @endforeach
        </div>
    @else
        <p>No comments yet from TMDB.</p>
    @endif

    <!-- Display comments from users -->
    @if (count($user_comments) > 0)
        <div class="comments-list">
            @foreach ($user_comments as $comment)
            
                <div class="comment">
                    <p>{{ $comment->body }}</p>
                    <span>Author : {{ $comment->name }}</span>
                </div>
            @endforeach
</div>
@else
    <p>No user comments yet.</p>
@endif



@endsection