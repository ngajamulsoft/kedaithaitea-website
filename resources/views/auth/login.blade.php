@extends('backend.layouts.app')
@section('content')
    
    <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Sign In</h2>
                                 <p>Login to stay connected.</p>
                                 <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input id="email" name="email" class="floating-input form-control @error('email') is-invalid @enderror" type="email" 
                                              placeholder=" " autofocus>
                                             <label>Email</label>
                                             @error('email')                                            
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input id="password" name="password" class="floating-input form-control @error('password') is-invalid @enderror" type="password" placeholder=" "
                                             >
                                             <label>Password</label>
                                             @error('password')                                            
                                                <span class="invalid-feedback" role="alert">
                                                   <strong>{{ $message }}</strong>
                                                </span>
                                             @enderror
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="custom-control custom-checkbox mb-3">
                                             <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                             <label class="custom-control-label control-label-1" for="remember">Remember Me</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          @if (Route::has('password.request'))
                                          <a href="{{ route('password.request') }}" class="text-primary float-right">{{ __('Forgot Your Password?') }}</a>
                                          @endif
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                    <p class="mt-3">
                                       Create an Account <a href="auth-sign-up.html" class="text-primary">Sign Up</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="{{ asset('backend/assets/images/logo.png') }}" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
    </section>

@endsection