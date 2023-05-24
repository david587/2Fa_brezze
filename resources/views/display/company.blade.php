@extends("main")

@section('title', 'Show')
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
                <a href="{{ route('company.edit', ['company' => $company]) }}" class="btn btn-dark me-2">Edit</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">Delete</button>
            </div>
            <a href="{{ route('list') }}" class="icon-link icon-link-hover link-success link-underline-success link-underline-opacity-25">
                Back to previous page
            </a>
        </div>
    </div>
</div>

<!-- Confirm Delete Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this company?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('company.destroy', ['company' => $company]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>                
            </div>
        </div>
    </div>
</div>
@endsection
