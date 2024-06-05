@extends('admin.layout')


@section('body')
    <section>
        <h1 class="text-center text-xl mb-4 font-semibold">Create article</h1>
        @include('admin.article.form', ['route' => route('articles.store')])
    </section>
@endsection
