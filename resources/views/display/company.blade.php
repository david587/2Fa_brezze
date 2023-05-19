@extends("main")

@section("content")
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            Company Details
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $company->name }}</h5>
            <p class="card-text">
                <strong>Tax Number:</strong> {{ $company->taxNumber }} <br>
                <strong>Phone:</strong> {{ $company->phone }} <br>
                <strong>Email:</strong> {{ $company->email }} <br>
            </p>
            <div class="d-flex justify-content-start mb-3">
                <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-primary me-2">Edit</a>
                <form action="{{ route('company.destroy', ['id' => $company->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <a href="/list" class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25">
                Back to previous page
            </a>
        </div>
    </div>
</div>
@endsection
