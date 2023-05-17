@extends('layouts.app')

@section('content')
    <div class="login-form py-4" style="margin-top: 0px">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-sm">
                        {{-- <span class="shape"></span> --}}
                        <div class="card-header text-center bg-transparent">
                            <i class="fas fa-user-circle" style="color: #1A374D"></i>
                            <h2>Register</h2>
                        </div>
                        <div class="card-body py-4">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <div class="d-flex">
                                        <input id="id_password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="new-password" placeholder="Enter your password">
                                        <span class="input-icon2 mt-1"><i class="far fa-eye" id="togglePassword"></i></span>
                                    </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">Confirm Password</label>
                                    <div class="d-flex">
                                        <input id="password_confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" placeholder="Enter your confirm password">
                                        <span class="input-icon2 mt-1"><i class="far fa-eye" id="newtogglePassword"></i></span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="form-group">
                                    <a href="{{ route('login') }}">Already have account?</a>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const newtogglePassword = document.querySelector('#newtogglePassword');
        const password = document.querySelector('#id_password');
        const confirmpassword = document.querySelector('#password_confirm');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
        newtogglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = confirmpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    
@endsection
