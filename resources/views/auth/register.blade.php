@extends('layout')

@section('body')
    <form method="post" action="{{ route('user.register') }}" class="max-w-sm mx-auto">
        @csrf
        <div class="mb-5">
            <label for="name" class="form-label">Your name</label>
            <input type="text" id="name" name="name" class="form-input" required/>
            @error('name')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
        </div>
        <div class="mb-5">
            <label for="email" class="form-label">Your email</label>
            <input type="email" id="email" class="form-input" name="email" placeholder="name@example.com" required/>
            @error('email')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
        </div>
        <div class="mb-5">
            <label for="password" class="form-label">Your password</label>
            <input type="password" id="password" name="password" class="form-input" required/>
            @error('password')<p class="text-xs text-red-500 my-1">{{$message}}</p>@enderror
        </div>
        <button type="submit"
                class="primary-button">
            Submit
        </button>
    </form>
@endsection
