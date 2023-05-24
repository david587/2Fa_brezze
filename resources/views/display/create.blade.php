@extends("main")

@section('title', 'Create')
@section("content")
<div class="container mt-5">
    <h1>Create Company</h1>
    <form action="{{ route('company.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Your company" required>
        </div>
        @error("name") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="taxNumber" class="form-label">Tax Number</label>
            <input value="{{ old('taxNumber') }}" type="number" class="form-control" id="taxNumber" name="taxNumber" placeholder="989899871" required>
        </div>
        @error("taxNumber") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input value="{{ old('phone') }}" type="text" class="form-control" id="phone" name="phone" placeholder="06308345693" required>
        </div>
        @error("phone") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{ old('email') }}" type="text" class="form-control" id="email" name="email" placeholder="example@gmail.com" >
        </div>
        @error("email") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-dark">Create</button>
    </form>
</div>
@endsection
