@extends('theme.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">{{ $post->title }}</h3>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->content }}</p>
                        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection