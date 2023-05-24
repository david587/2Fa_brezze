@extends("main")

@section('title', '2fa Login')
@section("content")
    <div class="container mt-5">
    <h1>Two Factor Authentication</h1>
    <form action="{{ route("2fa.login") }}" method="POST">
        @csrf
        <div class="mb-3 mt-5">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com" required>
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********" required>
        </div>
        @error("email") 
        <div class="alert alert-danger mt-3 mb-3" role="alert">
          {{ $message }}
        </div>
        @enderror
        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
      </div>
   
@endsection