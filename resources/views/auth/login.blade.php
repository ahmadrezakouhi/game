@extends('layouts.app')

@section('title','ورود')

@section('content')
<div class="container ">
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
            <div class="card shadow-lg mx-auto" style="max-width: 500px">
                <div class="card-header persian text-right">
{{--                    {{ __('Login') }}--}}
                    <h3>                    ورود
                    </h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group clearfix">
                            <label for="email" class="float-right persian">
{{--                                {{ __('E-Mail Address') }}--}}
                                ایمیل
                            </label>

{{--                            <div class="col-md-6">--}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback " role="alert">
{{--                                        <strong>{{ $message }}</strong>--}}
                                        <strong class="persian text-right float-right">این ایمیل ثبت نشده است</strong>
                                    </span>
                                @enderror
{{--                            </div>--}}
                        </div>

                        <div class="form-group ">
                            <label for="password" class="float-right persian">
{{--                                {{ __('Password') }}--}}
                                پسورد
                            </label>

{{--                            <div class="col-md-6">--}}
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
{{--                            </div>--}}
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group ">
{{--                            <div class="col-md-8 offset-md-4">--}}
                                <button type="submit" class="btn btn-primary persian float-left font-weight-bold">
{{--                                    {{ __('Login') }}--}}
                                    ورود
                                </button>

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
                        </div>
                    </form>
                </div>
            </div>
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection
