@extends('layout.login')

@section('title')
Halaman Login
@endsection

@section('container')
<div class="wrap-login100">
    <div class="login100-pic js-tilt" data-tilt>
        <img src="{{ asset('Login/images/img-01.png')}}" alt="IMG">
    </div>

    <form class="login100-form validate-form" action="/loginAdmin" method="post">
        @csrf
        <!-- alert berhasil register-->
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- alert ketika gagal untuk login -->
        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <span class="login100-form-title">
            Admin Login
        </span>

        <div class="wrap-input100 validate-input" data-validate="The Email field is required">
            <input class="input100" type="text" name="email" id="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="The Password field is required">
            <input class=" input100" type="password" name="password" id="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Login
            </button>
        </div>

        <div class="text-center p-t-12">
            <span class="txt1">
                Forgot
            </span>
            <a class="txt2" href="#">
                Username / Password?
            </a>
        </div>

        <div class="text-center p-t-136">
            <a class="txt2" href="/registerAdmin">
                Create your Account
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>
</div>
@endsection