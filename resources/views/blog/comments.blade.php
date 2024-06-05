<?php

$comments = $article->comments->where('parent_id', '=', null) ?? collect([]);

?>

<section class="not-format">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Discussion ({{$comments->count()}})</h2>
    </div>
    <form id="comment-form"
          @class(['pointer-events-none opacity-60 user-select-none' => !auth('web')->check(), 'mb-6']) method="post"
          action="{{route('comments.store', $article)}}">
        @csrf
        <div
            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="6"
                      name="content"
                      class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0"
                      placeholder="{{ auth('web')->check() ? 'Write a comment...' : 'Login in order to post a comment'}}"
                      required></textarea>
            @error('content')<p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror        </div>
        <button form="comment-form" type="submit"
                class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
            Post comment
        </button>
    </form>
    @foreach($comments as $comment)
        @php $children = $comment->children ?? collect([]) @endphp
        <div class="p-6 mb-6 text-base bg-gray-50 rounded-lg">
            <div class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900">
                        {{ $comment->user->name }}
                    </p>
                    <p class="text-sm text-gray-600">
                        <time datetime="{{$article->created_at}}"
                              title="{{$article->created_at}}">{{\Illuminate\Support\Carbon::parse($article->created_at)->format('M d, Y')}}</time>
                    </p>
                </div>
            </div>
            <p>{{$comment->content}}</p>
            <div class="flex flex-col  mt-4 space-x-4">
                <button type="button"
                        class="reply-button flex items-center font-medium text-sm text-gray-500 hover:underline">
                    <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                    </svg>
                    Reply
                </button>
                <form  id="comment-child-form"
                      @class(['pointer-events-none opacity-60 user-select-none' => !auth('web')->check(), 'reply-button-form my-4']) method="post"
                      action="{{route('comments.store', $article)}}">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div
                        class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea id="comment" rows="2"
                                  name="content"
                                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0"
                                  placeholder="{{ auth('web')->check() ? 'Write a reply...' : 'Login in order to reply'}}"
                                  required></textarea>
                        @error('content')<p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror        </div>
                    <button form="comment-child-form" type="submit"
                            class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
                        Reply
                    </button>
                </form>
            </div>
        </div>
        @foreach($children as $child)
            <div class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-gray-100 rounded-lg">
                <div class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900">
                            {{ $comment->user->name }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <time datetime="{{$child->created_at}}"
                                  title="{{$child->created_at}}">{{\Illuminate\Support\Carbon::parse($child->created_at)->format('M d, Y')}}</time>
                        </p>
                    </div>
                </div>
                <p>{{$child->content}}</p>
            </div>
        @endforeach
    @endforeach
</section>
