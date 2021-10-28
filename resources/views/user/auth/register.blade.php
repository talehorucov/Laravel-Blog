@extends('user.main_master')
@section('content')
@section('title')
    Qeydiyyat
@endsection
<div class="body-content login">
    <div class="container">
        <div class="login-form">
            <form method="POST" action="{{ route('user.register') }}">
                @csrf
                <div class="form-group">
                    <label>Ad Soyad <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Ad və Soyad" />
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Email ünvanı" />
                    @if ($message = session('email'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Şifrə <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Şifrə" />
                    @error('password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Şifrə Təsdiq<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" name="confirm_password" placeholder="Şifrə Təsdiq" />
                    @error('confirm_password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="text-center mt-2">
                    <button type="submit">Daxil Ol</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
