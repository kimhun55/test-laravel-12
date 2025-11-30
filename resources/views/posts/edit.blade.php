@extends('theme.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Edit Post</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content:</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $post->content }}</textarea>
                            </div>
                            <!-- Image upload field (optional) -->
                            @if($post->img_path)
                                <div class="mb-3">
                                    <label class="form-label">Current Image:</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $post->img_path) }}" alt="Post Image" class="img-fluid">
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="img_path" class="form-label">Change Image:</label>
                                <input type="file" class="form-control" id="img_path" name="img_path" accept="image/*">
                            </div>  
                            <!-- End Image upload field -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Update Post</button>
                                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection