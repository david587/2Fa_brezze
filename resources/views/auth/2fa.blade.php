@extends("codeSubmission")

@section('title', '2FA Verification')
@section("submission")
<div class="container mt-10">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">2FA Verification
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link">Use normal login instead</button>
                        </form>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="{{ route('2fa.post') }}">
                        @csrf
  
                        <p class="text-center">We sent code to email: {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}</p>
  
                        @if ($message = Session::get('success'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif
  
                        @if ($message = Session::get('error'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif
  
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>
  
                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus min="0" max="999999">
  
                                @if($errors->any())
                                <div class="alert alert-danger mt-3 mb-3" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                              @endif    
                            </div>
                        </div>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>
                            </div>
                        </div>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary bg-primary">
                                    Submit
                                </button>
  
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
