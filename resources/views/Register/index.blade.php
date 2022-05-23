@extends('layout.login')

@section('title')
Halaman Register
@endsection

@section('container')
<div class="wrap-login100">
    <div class="login100-pic js-tilt" data-tilt>
        <img src="{{ asset('Login/images/img-01.png')}}" alt="IMG">
    </div>

    <form class="login100-form validate-form">
        <span class="login100-form-title">
            Selamat Datang , Silahkan Register !!
        </span>

        <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="name" id="name" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-users" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" id="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" id="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Register
            </button>
        </div>

        <div class="text-center p-t-136">
        </div>
    </form>
</div>
@endsection