@extends("main")

@section('title', 'List')
@section("content")
<div class="">
    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            <span class="">{{ session('success') }}</span>
        </div>
        @endif
    </div>
        <div class="container">
            <p class="text-center fs-3"><span class="fs-1 m-3">Hi!</span> {{ auth()->user()->name }}</p>
        </div>
        <a href="{{ route('create') }}">
          <button type="button" class="btn btn-dark">Add company</button>
        </a>
        <div class="mt-2">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">taxNumber</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                  <tr >
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->taxNumber }}</td>
                    <td>
                      <a href="{{ route('company.showCompany', ['company' => $company]) }}">
                        <button type="button" class="btn btn-warning">Details</button>
                    </a>
                    
                    </td>
                    
                  </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
</div>
@endsection