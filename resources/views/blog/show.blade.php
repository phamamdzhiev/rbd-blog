@extends('layout')

@section('body')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue">
                <header class="mb-4 lg:mb-6 not-format">
                    <h1 class="capitalize mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                        {{$article->title}}
                    </h1>
                </header>

                <section class="mb-8">
                    <p class="text-xl lead">{!! $article->content !!}</p>
                </section>

                @include('blog.comments')
            </article>
        </div>
    </main>
@endsection
