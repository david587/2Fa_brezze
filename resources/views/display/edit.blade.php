@extends("main")

@section('title', 'Edit')
@section("content")
<div class="container mt-5">
    <h1>Edit Company</h1>
    <form action="{{ route('company.update', ['company' => $company]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
        </div>
        @error("name") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="taxNumber" class="form-label">Tax Number</label>
            <input type="text" class="form-control" id="taxNumber" name="taxNumber" value="{{ $company->taxNumber }}" required>
        </div>
        @error("taxNumber") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->phone }}" required>
        </div>
        @error("phone") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}" required>
        </div>
        @error("email") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror

        <button type="submit" class="btn btn-dark">Update</button>
    </form>
</div>
@endsection
