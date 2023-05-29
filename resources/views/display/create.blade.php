@extends("dashboard")

@section('title', 'Create')
@section("content")
<div class="container mt-5">
    <h1 class="text-center">Create Company</h1>
    <form action="{{ route('company.create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name" placeholder="Your company" required pattern="[A-Za-z0-9\s]+" title="Please enter a valid company name (only letters, numbers, and spaces are allowed)">
        </div>
        @error("name") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="taxNumber" class="form-label">Tax Number</label>
            <input value="{{ old('taxNumber') }}" type="text" class="form-control" id="taxNumber" name="taxNumber" placeholder="989899871" required pattern="[0-9]{9}" title="Please enter a 9-digit tax number">
        </div>
        @error("taxNumber") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input value="{{ old('phone') }}" type="text" class="form-control" id="phone" name="phone" placeholder="06308345693" required pattern="[0-9()+-]{10,20}" title="Please enter a valid phone number (including +, (), and -)">
        </div>
        @error("phone") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required>
        </div>
        @error("email") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-dark text-success">Create</button>
    </form>
</div>
@endsection
