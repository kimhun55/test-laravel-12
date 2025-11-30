@extends('theme.layout')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Home Posts<button class="btn btn-primary btn-sm" onclick="window.location='{{ route('posts.create') }}'">Create Post</button></h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title h4">{{ $post->title }}</h2>
                        <p class="card-text text-muted">{{ $post->content }}</p>
                        <!-- button view post -->
                        <a href="{{ route('posts.show',$post)}}" class="btn btn-primary btn-sm">Read More</a>
                        <!-- edit and delete buttons -->
                        <div class="mt-3">
                            <a href="#" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection