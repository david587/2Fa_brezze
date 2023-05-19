@extends("main")

@section("content")
    <div class="container mt-5">
    <h1>Welcome!</h1>
    <p>Please login with your credentials:</p>
    <form action="/authenticate" method="POST">
        @csrf
        <div class="mb-3 mt-5">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@gmail.com">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="********">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        @error("email") 
        <p class=""> 
        {{$message}} 
        </p> 
        @enderror
      </form>
      </div>
   
@endsection