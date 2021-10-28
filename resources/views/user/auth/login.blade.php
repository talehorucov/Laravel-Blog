@extends('user.main_master')
@section('content')
@section('title')
    Giriş
@endsection
<div class="body-content login">
    <div class="container">
        <div class="login-form">
            <form method="POST" action="{{ route('user.login') }}">
                @csrf
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Email ünvanı" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Şifrə <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Şifrə" />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($message = session('error'))
                    <span class="text-danger">{{ $message }}</span>
                @endif
                <div class="checkbox checkbox-primary">
                    <input id="checkbox" name="remember" type="checkbox">
                    <label for="checkbox">Yadda Saxla</label>
                </div>
                <div class="text-center">
                    <button type="submit">Daxil Ol</button>
                </div>
            </form>
            <label class="lost-password text-center">
                <a href="{{ route('user.register') }}">Qeydiyyat</a>
            </label>
            <label class="lost-password text-center">
                <a href="{{ route('user.forgot.passwordForm') }}">Şifrəni Unutmusan ?</a>
            </label>
        </div>
    </div>
</div>

@endsection
