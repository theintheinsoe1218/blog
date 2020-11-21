@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $article['title'] }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }},
                    Category: <b>{{ $article->category->name }}</b>
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a class="card-link" href="{{ url("/articles/delete/$article->id") }}">Delete</a>
            </div>

        </div>
        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b>

            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                    <a href="{{ url("/comments/delete/$comment->id") }}" class="close">&times;</a>
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>
        @auth
            <form action="{{ url("/comments/add") }}" method="POST">
                @csrf
                <input type="hidden" name="article_id"
                value="{{ $article->id }}">
                <textarea name="content" id="" class="form-control mb-2 mt-2" placeholder="New Comment"></textarea>
                <input type="submit" value="Add Commemt" class="btn btn-secondary">

            </form>
        @endauth


    </div>
@endsection
