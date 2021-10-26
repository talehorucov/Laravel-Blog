@extends('user.main_master')
@section('content')
@section('title')
    Giriş
@endsection
<div class="body-content login">
    <div class="container">
        <div class="login-form">
            <form method="POST" action="{{ route('user.forgot.password') }}">
                @csrf
                
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="Email ünvanı" required />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($message = session('error'))
                    <span class="text-danger">{{ $message }}</span>
                @elseif ($message = session('success'))
                    <span class="text-success">{{ $message }}</span>
                @endif
                <div class="text-center">
                    <button type="submit">Şifrəmi Yenilə</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
