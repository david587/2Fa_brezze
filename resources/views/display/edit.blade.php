@extends("dashboard")

@section('title', 'Edit')
@section("content")
<div class="container mt-5">
    <h1 class="text-center">Edit Company</h1>
    <form action="{{ route('company.update', ['company' => $company]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required maxlength="100" title="Please enter the company name">
            @error("name")
            <div class="alert alert-danger mt-3 mb-3" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="taxNumber" class="form-label">Tax Number</label>
            <input type="text" class="form-control" id="taxNumber" name="taxNumber" value="{{ $company->taxNumber }}" required pattern="[0-9]{8}" title="Please enter an 8-digit tax number">
            @error("taxNumber")
            <div class="alert alert-danger mt-3 mb-3" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $company->phone }}" required pattern="[0-9()+-]{10,20}" title="Please enter a valid phone number (including +, (), and -)">
            @error("phone")
            <div class="alert alert-danger mt-3 mb-3" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}" required title="Please enter a valid email address">
            @error("email")
            <div class="alert alert-danger mt-3 mb-3" role="alert">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark bg-dark text-light">Update</button>
    </form>
</div>
@endsection
