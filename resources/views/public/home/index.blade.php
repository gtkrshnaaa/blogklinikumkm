@extends('layouts.app')

@section('content')
    <style>
        .square-image-wrapper {
            position: relative;
            width: 100%;
            padding-top: 100%;
            /* 1:1 Aspect Ratio */
            overflow: hidden;
        }

        .square-image-wrapper img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- Search Bar -->
                <div class="card shadow mb-4" style="border: none;">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <form action="/search" method="GET">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search for...">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Go!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Search Bar -->

                <!-- Recent Posts -->
                <div class="card shadow mb-4" style="border: none;">
                    <h5 class="card-header">All Posts</h5>
                    <div class="card-body">
                        @foreach ($posts as $post)
                            <!-- Periksa apakah post memiliki cover photo -->
                            @if ($post->cover_photo)
                                <div class="row mb-3 d-flex align-items-stretch">
                                    <div class="col-md-4">
                                        <!-- Crop gambar dengan ukuran 1:1 -->
                                        <div class="square-image-wrapper">
                                            <img src="{{ asset('storage/' . $post->cover_photo) }}"
                                                alt="{{ $post->title }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card" style="border: none;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <div class="d-flex">
                                                    <p>{{ $post->view_count }} Views &nbsp;&middot;&nbsp;
                                                    @if ($post->author)
                                                        {{ $post->author->name }}
                                                    @elseif ($post->admin)
                                                        {{ $post->admin->name }}
                                                    @else
                                                        Creator Unknown
                                                    @endif
                                                    &nbsp;&middot;&nbsp;{{ $post->category->name }}
                                                    </p>
                                                </div>
                                                <p class="card-text">{{ $post->created_at->format('d F Y') }} -
                                                    {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 100, '...') !!}</p>
                                                <a href="{{ route('public.posts.showdetail', $post->slug) }}"
                                                    class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- End Recent Posts -->

                <!-- Pagination Links -->
                {{ $posts->links() }}

            </div>
            <div class="col-md-4">
                <!-- Popular Posts -->
                <div class="card shadow mb-4" style="border: none;">
                    <h5 class="card-header">Popular Posts</h5>
                    <div class="card-body">
                        @foreach ($popularPosts as $popularPost)
                            <!-- Periksa apakah post populer memiliki cover photo -->
                            @if ($popularPost->cover_photo)
                                <div class="row mb-3 d-flex align-items-stretch">
                                    <div class="col-md-4">
                                        <div class="square-image-wrapper">
                                            <img src="{{ asset('storage/' . $popularPost->cover_photo) }}"
                                                alt="{{ $popularPost->title }}" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h5>{{ $popularPost->title }}</h5>
                                        <p>{{ $popularPost->view_count }} Views</p>
                                        <a href="{{ route('public.posts.showdetail', $popularPost->slug) }}"
                                            class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- End Popular Posts -->

                <!-- Categories -->
                <div class="card shadow mb-4" style="border: none;">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($categories as $category)
                                <li class="list-group-item">
                                    <a
                                        href="{{ route('public.posts.category', $category->id) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Categories -->
            </div>
        </div>
    </div>
@endsection
