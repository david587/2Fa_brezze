@extends("main")

@section("content")
    <div class="container mt-5">
        @if (session('success'))   
        <div class="alert alert-success" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
    </div>

    <div class="mt-5">

    </div>
@endsection