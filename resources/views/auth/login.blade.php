@extends('layouts.app')

@section('content')

<div class="login-box">
  <div class="login-logo">
  <a href="#">
    <img src="{{asset('images/school_logo.jpg')}}" alt="logo">
  </a>

  
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg ">Sign in to start your session</p>
      @include('partials.errors')
      @if(Session::has('success_message'))
			  <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">{{ Session::get('success_message') }}</p>
			  @endif

		  @if(Session::has('failure_message'))
		  <p class="alert {{ Session::get('alert-class', 'alert-info') }} successErrorMessage">{{ Session::get('failure_message') }}</p>
		  @endif
  {!! Form::open(['url' => '/admin/login', 'name' => 'login_form', 'class' =>'', 'id' => 'login_form', 'method' => 'post','role'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="input-group mb-3">

          {!! Form::text('email', old('email'), ['class'=>'form-control','autocomplete'=>'off', 'placeholder'=>'Enter Email']) !!}
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">

          {!! Form::password('password', ['class' => 'form-control','autocomplete'=>'off','placeholder' => 'Enter Password']) !!}
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mt-0 pt-0">
          <div class="col-6 col-md-6">
            <div class="icheck-primary">
             
              {{-- {!! Form::checkbox('remember','',['class' => 'form-control','name'=>'remember', 'id'=>'remember']) !!} --}}
              <input type="checkbox" id="remember" name="remember" class="form-control">
              {!! Form::label('remember', 'Remember Me:') !!}
             
            </div>
          </div>
          <!-- /.col -->
          <div class="col-6 col-md-6 text-right pl-0">
           
            <a class="passwrdfrgt" href="#">Forgot your password?</a>
          </div>
          <!-- /.col -->
        </div>

        <div class="mt-4 pt-1"> <button type="submit" class="btn btn-primary btn-block">Sign In</button></div>
        {!! Form::close() !!}

        <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
        <!-- /.social-auth-links -->



       
        <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
@section('script')
@endsection