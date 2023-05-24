@extends("main")

@section('title', 'Normal login')
@section("content")
    <div class="container mt-5">
    <h1>Welcome!</h1>
    <p>To get a random user run: php artisan init:randomuser</p>
    <form action="{{ route("authenticate") }}" method="POST">
        @csrf
        <div class="mb-3 mt-5">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input value="{{ old('email') }}" type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********" required>
        </div>
        @if($errors->any())
        <div class="alert alert-danger mt-3 mb-3" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif    
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
      </div>
   
@endsection