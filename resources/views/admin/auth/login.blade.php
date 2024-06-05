@extends('admin.layout')

@section('body')
    <div class="h-screen overflow-hidden flex items-center justify-center">
        <div class="bg-white lg:w-6/12 md:7/12 w-8/12 shadow-3xl rounded-xl">
            <h1 class="text-2xl font-semibold text-center mb-8">Admin area {{ config('app.name') }}</h1>
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-sm text-red-500 text-center my-2">:message</div>')) !!}
            @endif
            <form method="post" action="{{route('admin.login')}}" class="p-4">
                @csrf
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <input type="text" id="email"
                           value="{{old('email')}}"
                           name="email"
                           class="bg-slate-200 rounded pl-12 py-2 md:py-4 focus:outline-none w-full"
                           placeholder="Email:"
                           required
                    />
                </div>
                <div class="flex items-center text-lg mb-6 md:mb-8">
                    <input type="password" id="password"
                           name="password"
                           value="{{old('password')}}"
                           class="bg-slate-200 rounded pl-12 py-2 md:py-4 focus:outline-none w-full"
                           placeholder="Password:"
                           required/>
                </div>
                <button
                    class="bg-gradient-to-b from-slate-700 to-slate-900 font-medium p-2 md:p-4 text-white uppercase w-full rounded">
                    Login
                </button>
            </form>
        </div>
    </div>
@endsection
