@extends('layout')

@section('body')
    <section class="max-w-screen-lg mx-auto py-16">
        <h1 class="mb-12 text-center font-sans text-5xl font-bold">Our Blog</h1>
        <div class="grid grid-cols-1 gap-5 p-5 sm:grid-cols-2 md:grid-cols-3 lg:gap-10">
            @forelse($articles as $article)
                <x-article :$article/>

            @empty
                <p class="text-xl my-4">No articles found</p>
            @endforelse
        </div>
        <div class="mt-4">
            {{$articles->links()}}
        </div>
    </section>
@endsection
