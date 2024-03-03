@extends('layouts.auth')

@section('title')
    Log in
@endsection

@section('login')
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
        <svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
          x="0px" y="0px" width="100px" height="100px" viewBox="0 0 100 100" xml:space="preserve">
        <g>
          <circle fill="#1E1E1E" cx="32.3" cy="70.1" r="7.5"/>
          <circle fill="#1E1E1E" cx="62.4" cy="70.1" r="7.5"/>
          <g>
            <path fill="#231F20" d="M69.8,55L69.8,55c0,1.4-1.1,2.5-2.5,2.5h-40c0,0-0.1,0-0.1,0c0,0,0,0,0,0c-0.2,0-0.5,0-0.7-0.1
              c-0.1,0-0.1,0-0.2-0.1c-0.1,0-0.2-0.1-0.3-0.2c-0.1,0-0.1-0.1-0.2-0.1c0,0-0.1,0-0.1-0.1c-0.1-0.1-0.1-0.1-0.2-0.2
              c-0.3-0.3-0.5-0.7-0.6-1.1l-12.7-48c0-0.2-0.2-0.3-0.4-0.3H2.5C1.1,7.4,0,6.3,0,4.9V4.8c0-1.4,1.1-2.5,2.5-2.5h11.7
              c0.7,0,1.4,0.3,1.8,0.8c0.1,0.1,0.1,0.1,0.2,0.2c0,0,0,0.1,0.1,0.1c0.1,0.2,0.3,0.5,0.3,0.7l0.1,0.3v0l12.6,47.7
              c0,0.2,0.2,0.3,0.4,0.3h37.8C68.7,52.5,69.8,53.6,69.8,55z"/>
            <path fill="#231F20" d="M16.6,4.5l-0.1-0.3c-0.1-0.3-0.2-0.5-0.3-0.7C16.4,3.8,16.5,4.1,16.6,4.5z"/>
            <path fill="#231F20" d="M16,3.2c-0.5-0.5-1.1-0.8-1.8-0.8h-0.4C14.6,2.2,15.4,2.6,16,3.2z"/>
          </g>
          <path fill="#FFC107" d="M18.5,12.6l9.3,34.8l44.5-2.2c1.3-0.1,2.4-1,2.6-2.3l5-27.1c0.3-1.6-1-3.2-2.6-3.2
            C77.3,12.6,18.5,12.6,18.5,12.6z"/>
          <g>
            <path fill="#FFFFFF" d="M32.4,37.6L32.4,37.6c-1.4,0-2.5-1.1-2.5-2.5V25.1c0-1.4,1.1-2.5,2.5-2.5l0,0c1.4,0,2.5,1.1,2.5,2.5v10.1
              C34.9,36.5,33.8,37.6,32.4,37.6z"/>
            <path fill="#FFFFFF" d="M47.5,37.6L47.5,37.6c-1.4,0-2.5-1.1-2.5-2.5V25.1c0-1.4,1.1-2.5,2.5-2.5l0,0c1.4,0,2.5,1.1,2.5,2.5v10.1
              C50,36.5,48.9,37.6,47.5,37.6z"/>
            <path fill="#FFFFFF" d="M62.4,37.6L62.4,37.6c-1.4,0-2.5-1.1-2.5-2.5V25.1c0-1.4,1.1-2.5,2.5-2.5l0,0c1.4,0,2.5,1.1,2.5,2.5v10.1
              C64.9,36.5,63.8,37.6,62.4,37.6z"/>
          </g>
        </g>
        </svg>
      </div>

      <form action="{{route('login')}}" method="post">
      @csrf
        <div class="input-group mb-3 ">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputError" placeholder="Email" required value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputError" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <span id="exampleInputEmail1-error" class="error invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection