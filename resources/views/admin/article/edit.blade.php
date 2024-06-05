@extends('admin.layout')


@section('body')
    <section>
        <h1 class="text-center text-xl mb-4 font-semibold">Edit "{{ $article->title }}"</h1>
        @include('admin.article.form', ['route' => route('articles.update', $article->id)])
    </section>
@endsection
