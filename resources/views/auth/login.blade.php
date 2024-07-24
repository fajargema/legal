@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/images/logo-pm.png') }}" height="48" class='mb-4'>
                        <h3>Sign In</h3>
                        <p>PT Purimega Saranaland.</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Username</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                    required autocomplete="username" autofocus>
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <div class="clearfix">
                                <label for="password">Password</label>

                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class='float-end'>
                                    <small>Forgot password?</small>
                                </a>
                                @endif
                            </div>
                            <div class="position-relative">
                                <input type="password" class="form-control" name="password" required
                                    autocomplete="current-password">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                        <div class='form-check clearfix my-4'>
                            <div class="checkbox float-start">
                                <input class='form-check-input' type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>
                                <label for="checkbox1">Remember me</label>
                            </div>
                            <div class="float-end">
                                <button class="btn btn-primary float-end">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
