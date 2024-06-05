@extends('admin.layout')


@section('body')

    <section>
        <a href="{{ route('articles.create') }}" class="inline-block mb-4 primary-button">Create new</a>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Article
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Published?
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created at
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last updated at
                    </th>
                    <th scope="col" class="px-6 py-3">

                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr class="bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            <a href="{{ route('articles.edit', $article->id) }}">
                                <img class="max-w-[150px]" src="@image($article->image_path)"
                                     alt="{{$article->title}}"/>
                            </a>
                        </th>
                        <td class="px-6 py-4" style="max-width: 240px;">
                            {{$article->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->admin?->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->is_published ? 'Yes' : 'No'}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->created_at}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('articles.edit', $article->id) }}"
                               class="font-medium text-blue-500 hover:underline">Edit</a>
                            <form onsubmit="return window.confirm('Are you sure?')"
                                  action="{{ route('articles.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
