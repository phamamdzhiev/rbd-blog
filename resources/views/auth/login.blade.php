@extends('layout')

@section('body')
    <form method="post" action="{{ route('user.login') }}" class="max-w-sm mx-auto">
        @csrf
        <div class="mb-5">
            <label for="email" class="form-label">Your email</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="name@example.com" required/>
        </div>
        <div class="mb-5">
            <label for="password" class="form-label">Your password</label>
            <input type="password" id="password" name="password" class="form-input" required/>
        </div>
        <button type="submit"
                class="primary-button">
            Submit
        </button>
    </form>
@endsection
