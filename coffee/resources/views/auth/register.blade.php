@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg my-5">
                <div class="card-header text-center text-white" style="background-color: #d63384;">
                    <h3 class="font-fancy">{{ __('Register') }}</h3>
                </div>

                <div class="card-body bg-light-pink">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" id="registerForm">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-pink">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-pink">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-pink">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-pink">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end text-pink">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="farmer">Farmer</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-end text-pink">{{ __('Profile Image') }}</label>
                            <div class="col-md-6">
                                <input id="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" required>
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="background-color: #d63384; border-color: #d63384;">
                                    {{ __('Register') }}
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

<!-- Additional CSS for the theme -->
<style>
    body {
        background: linear-gradient(to right, #ff99cc, #ffccff);
    }
    .font-fancy {
        font-family: 'Great Vibes', cursive;
    }
    .text-pink {
        color: #d63384;
    }
    .bg-light-pink {
        background-color: #fff0f6;
    }
</style>

<!-- Additional JavaScript for form validation -->
<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        var profileImage = document.getElementById('profile_image').value;
        if (!profileImage) {
            alert('Profile image is required.');
            event.preventDefault();
        }
    });
</script>
