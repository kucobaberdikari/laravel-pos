@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('login')
<div class="login-box">
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo">
       <img src="{{ url($setting->path_logo) }}" class=" text-2xl">
      </div>

      <form action="{{route('login')}}" method="post">
      @csrf
        <div class="input-group mb-3 ">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="inputError" placeholder="Email" required value="{{old('email')}}" autofocus>
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