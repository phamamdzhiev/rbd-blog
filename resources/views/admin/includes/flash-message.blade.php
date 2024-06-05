{{-- error --}}
@if (Session::has('error'))
    <div class="flex justify-center items-center shadow-md p-4 mb-6 text-red-800 bg-red-100 " role="alert">
        <div class="ml-3 text-sm font-medium">
            {{ Session::get('error') }}
        </div>
    </div>
@endif

{{-- success --}}
@if (Session::has('success'))
    <div class="flex justify-center items-center shadow-md p-4 mb-6 text-green-800 bg-green-100 " role="alert">
        <div class="ml-3 text-sm font-medium">
            {{ Session::get('success') }}
        </div>
    </div>
@endif
