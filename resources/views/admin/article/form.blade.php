<form enctype='multipart/form-data' class="max-w-3xl mx-auto" method="POST" action="{{$route}}">
    @csrf

    @isset($article)
        @method('PUT')
    @endisset

    <div class="mb-5">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-input"
               value="{{ old('title', isset($article) ? $article->title  : '')}}"/>
        @error('title')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
    </div>

    <div class="mb-5">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-input"
                  rows="10">{{ old('content', isset($article) ? $article->content  : '')}}</textarea>
        @error('content')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
    </div>

    <div class="mb-5">
        <label for="is_published" class="form-label">Published?</label>
        <select name="is_published" class="form-input" id="is_published">
            <option value="1" @selected(isset($article) ? $article->is_published == 1 : 1 ) >Yes</option>
            <option value="0" @selected(isset($article) ? $article->is_published == 0 : 0 ) >No</option>
        </select>
        @error('is_published')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
    </div>

    <div class="mb-5">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image" class="form-input" accept="image/*"/>
        @error('image')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
    </div>
    @isset($article)
        <div class="mb-5">
            <img width="300" src="@image($article->image_path)" alt="{{$article->title}}" />
        </div>
    @endisset
    <button type="submit" class="primary-button">{{ isset($article) ? 'Edit' : 'Save' }}</button>
</form>

