@extends('layout')

@section('body')
    <section class="py-16">
        <h1 class="mb-12 text-center font-sans text-5xl font-bold">Our Blog</h1>
        <div class="mx-auto grid max-w-screen-lg grid-cols-1 gap-5 p-5 sm:grid-cols-2 md:grid-cols-3 lg:gap-10">
            @forelse($articles as $article)
                <x-article :$article />
            @empty
                <p class="text-xl my-4">No articles found</p>
            @endforelse
        </div>
    </section>
@endsection
