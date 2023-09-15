@extends('layouts.main')
@section('title', "$blog->title - by " . $blog->user->name)

@section('content')

<div class="container mx-auto px-4 py-8 bg-slate-800">
    @if ($blog->user_id == Auth::id())
    <div class="flex justify-end bg-slate-800">
        <a href="{{ route('delete-post', $blog->id) }}"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete
            post</a>
    </div>
    @endif
    <article class="bg-slate-800 rounded-lg shadow-md overflow-hidden">
        <div class="relative flex justify-center bg-black bg-opacity-75">
            <img src="{{ asset('uploads/' . $blog->thumbnail) }}" class="w-500 h-500 object-cover" alt="">
            <h1
                class="absolute text-center bottom-0 left-0 right-0 bg-black bg-opacity-75 text-white text-5xl py-2 px-4 rounded rounded-bl rounded-br">
                {{ $blog->title }}
            </h1>
        </div>
        <div class="p-4 rounded">
            <p class="text-gray-400 float-right">{{ $blog->created_at->format('F d, Y') }}</p>
        </div>

        <div class="px-4 py-2 m-5 text-slate-300 text-2xl w-full text-left">
            {!! $blog->content !!}
        </div>

        <h1 class="text-3xl m-5 text-slate-300">Gallery</h1>
        <div class="container mx-auto px-5 py-2 lg:px-32 lg:pt-12">
            <div class="-m-1 flex flex-wrap md:-m-2">
                @foreach ($blog->images as $image)
                <div class="flex w-1/3 flex-wrap">
                    <div class="w-full p-1 md:p-2">
                        <img src="{{ asset('uploads/' . $image->path) }}" alt="Image Description"
                            class="block h-full w-full rounded-lg object-cover object-center" />

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </article>
</div>
@endsection