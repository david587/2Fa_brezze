@extends("main")

@section("content")
<div class="container">
    <h1>Edit Company</h1>
    <form action="{{ route('company.update', ['id' => $company->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}">
        </div>

        <div class="mb-3">
            <label for="taxNumber" class="form-label">Tax Number</label>
            <input type="text" class="form-control" id="taxNumber" name="taxNumber" value="{{ $company->taxNumber }}">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->phone }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
