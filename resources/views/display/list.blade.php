@extends("main")

@section("content")
    <div class="container mt-5">
        @if (session('success'))   
        <div class="alert alert-success" role="alert">
            <span class="">{{ session('success') }}</span>
        </div>
        @endif
    </div>

    <button type="button" class="btn btn-primary">Add company</button>
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
              <tr>
                <td>{{ $company->name }}</td>
                <td>{{ $company->taxNumber }}</td>
              </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection