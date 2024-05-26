@extends('layouts.guest')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                            <img src="assets/img/logo.png" alt="" />
                            <span class="d-none d-lg-block">Laravel Lesson</span>
                        </a>
                    </div>
                    <!-- End Logo -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                <p class="text-center small">Enter your username & password to login</p>
                            </div>
                            
                            <form method="POST" action="{{ route('login') }} " class="row g-3 needs-validation">
                                @csrf
                        
                                <!-- Email Address -->
                                <div class="col-12">
                                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="invalid-feedback" />
                                </div>
                                <!-- Password -->
                                <div class="col-12">
                                    <x-input-label for="password" :value="__('Password')"  class="form-label"/>
                        
                                    <x-text-input id="password" class="form-control"
                                                    type="password"
                                                    name="password"
                                                    required autocomplete="current-password" />
                        
                                    <x-input-error :messages="$errors->get('password')" class="invalid-feedback" />
                                </div>
                        
                                <!-- Remember Me -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember_me" type="checkbox" name="remember">
                                        <label class="form-check-label" id="remember_me" type="checkbox" name="remember">{{ __('Remember me') }}</label>
                                    </div>
                                </div>
                        
                                <div class="col-12">
                                    <x-primary-button class="btn btn-primary w-100">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                  </div>
                        
                                <div class="flex items-center justify-end mt-4">
                                    @if (Route::has('password.request'))
                                        <a class="small mb-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div>
                                    <a  class="small mb-0" href="{{ route('register') }}">
                                        {{ __('Dont have an Account?') }}
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

