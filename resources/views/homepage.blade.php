@extends('layouts.main')

@section('title', 'Homepage')
@section('content')
<div class="text-5xl">
    <div class="container mx-auto px-4 py-8">
        @include('notification.message')
        <h1 class="text-5xl text-slate-300 text-center font-semibold mb-6">Latest Blog Posts</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            @foreach ($blogs as $blog)
            <div
                class="bg-white rounded-lg shadow-md overflow-hidden transform scale-100 hover:scale-110 transition-transform delay-50">
                <div class="image-container relative" style="padding-bottom: 75%;">
                    @if(isset($blog->thumbnail))
                    <img src="{{ asset('uploads/' . $blog->thumbnail) }}" alt="Image Description"
                        class="absolute h-full w-full object-cover rounded">
                    @elseif (isset($blog->images) and count($blog->images) > 0)
                    <img src="{{ asset('uploads/' . $blog->images[0]->path) }}" alt="Image Description"
                        class="absolute h-full w-full object-cover rounded">
                    @else

                    <h1>Post has no images 🥺</h1>

                    @endif
                </div>
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">Author: {{ $blog->user->name }}</h2>
                    <p class="text-gray-600 text-3xl">{{ $blog->title }}</p>
                    <a href="{{route('blog-post', $blog->id)}}"
                        class="mt-2 text-center w-full inline-block bg-slate-800 text-white py-2 px-4 rounded hover:bg-slate-600 transition duration-300">Read
                        more</a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-8">
            <nav class="text-center" aria-label="Pagination">
                {{ $blogs->links() }}
            </nav>
        </div>
    </div>
</div>
<style>
    .image-container {
        height: 0;
        overflow: hidden;
    }
</style>
@endsection