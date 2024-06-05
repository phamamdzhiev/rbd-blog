<article
    class="group h-full overflow-hidden rounded-lg border-2 border-gray-200 border-opacity-60 shadow-lg">
    <a href="{{route('blog.article', $article)}}">
        <img
            class="w-full transform object-cover object-center transition duration-500 ease-in-out group-hover:scale-105 md:h-36 lg:h-48"
            src="@image($article->image_path)"
            alt="{{$article->title}}"
        />
    </a>
    <div class="py-3 px-6">
        <a href="{{route('blog.article', $article)}}">
            <h1 class="title-font mb-3 text-xl capitalize font-extrabold tracking-wide text-gray-800 line-clamp-2">
                {{$article->title}}
            </h1>
        </a>
        <p class="mb-3 overflow-hidden leading-relaxed text-gray-500 line-clamp-4">
            {{$article->content}}
        </p>
    </div>
    <div class="flex flex-wrap items-center justify-between px-6 pt-1 pb-4">
        <div class="flex flex-wrap text-sm text-gray-500">
            <span class="mr-1">{{\Illuminate\Support\Carbon::parse($article->created_at)->format('M d, Y')}}</span>
        </div>
        <div class="mt-1">
        <span
            class="inline-flex items-center py-1 text-sm leading-none text-gray-400">
{{--          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">--}}
            {{--            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
            {{--                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>--}}
            {{--            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
            {{--                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>--}}
            {{--          </svg>--}}
            {{$article->comments->where('parent_id', null)->count()}} Comments
        </span>
        </div>
    </div>
</article>
