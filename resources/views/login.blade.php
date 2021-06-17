@extends('layouts.login.app')

@section('content')
<div class="wrap-login100">
    <form class="login100-form validate-form" action="{{ route('loginCheck') }}" method="POST">
        @csrf
        <span class="login100-form-title p-b-34 p-t-27">
            GİRİŞ
        </span>
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
            {{ session()->forget('message') }}
        @endif
        <div class="wrap-input100 validate-input" data-validate = "Enter username">
            <input class="input100" type="text" name="email" required placeholder="Mail Adresi">
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Enter password">
            <input class="input100" type="password" required name="password" placeholder="Şifre">
            <span class="focus-input100" data-placeholder="&#xf191;"></span>
        </div>
        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Giriş
            </button>
        </div>
    </form>
</div>
@endsection