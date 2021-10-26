@extends('user.main_master')
@section('content')
@section('title')
    Giriş
@endsection
<div class="body-content login">
    <div class="container">
        <div class="login-form">
            <form method="POST" action="{{ route('user.update.forgotpassword') }}">
                @csrf                
                <div class="form-group">
                    <label>Yeni Şifrə {{ $user->name }} <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Yeni Şifrə" required />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Təsdiq Şifrə <span class="text-danger">*</span></label>
                    <input type="password" name="password_confirm" class="form-control" placeholder="Yeni Şifrə Təsdiq" required />
                    @error('password_confirm')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($message = session('error'))
                    <span class="text-danger">{{ $message }}</span>
                @endif
                <div class="text-center">
                    <button type="submit">Şifrəmi Yenilə</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
