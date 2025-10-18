@extends('layouts.custom-master1')

@section('styles')

@endsection

@section('content')

        <div class="container-lg">
            <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                    <div class="my-4 d-flex justify-content-center">
                        <a href="{{url('index')}}">
                            <h2 class="text-white">Admin</h2>
                        </a>
                    </div>
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="authentication-cover">
                                <div class="aunthentication-cover-content">
                                    <p class="h4 fw-bold mb-2 text-center">Sign up</p>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="name" class="form-label text-default op=8">Name</label>
                                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="email" class="form-label text-default op=8">Email address</label>
                                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="mobile" class="form-label text-default op=8">Mobile</label>
                                                <input id="mobile" type="text" class="form-control form-control-lg @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required>
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12">
                                                <label class="form-label text-default d-block">Password</label>
                                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12">
                                                <label class="form-label text-default d-block">Confirm Password</label>
                                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                            <div class="col-xl-12 d-grid mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Create account</button>
                                            </div>
                                            <div class="col-xl-12 d-grid mt-2">
                                                <a href="{{ route('login') }}" class="btn btn-lg btn-outline-primary">Back to Sign In</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')



@endsection


