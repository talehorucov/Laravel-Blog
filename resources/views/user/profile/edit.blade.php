@extends('user.main_master')
@section('content')
@section('title')
    Hesabı Redaktə Et
@endsection
<div class="body-content">
    <div class="container">
        <div class="login-form">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div>
                            <img style="width: 200px; height:200px" src="{{ asset(auth()->user()->image) }}">
                        </div>
                        <div class="mt-5">
                            <strong style="color: rgb(85, 74, 243);">Email</strong>
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <form method="POST" action="{{ route('user.profile.update', auth()->user()) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Ad <span class="text-danger">*</span></label>
                            <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control"
                                placeholder="Ad Soyad" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" value="{{ auth()->user()->email }}" name="email"
                                class="form-control" placeholder="Email ünvanı" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Nömrə</label>
                            <input type="text" value="{{ auth()->user()->phone }}" name="phone" class="form-control"
                                placeholder="Nömrə" />
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Şəkil</label>
                            <div>
                                <input type="file" name="image">
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Şifrə <span class="text-danger">*</span></label>
                            <input type="password" value="" id="password" class="form-control" name="password"
                                placeholder="Şifrə" />
                            <input type="checkbox" onclick="showPassword()">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Haqqımda</label>
                            <textarea style="font-size: 16px" class="form-control" name="about" rows="5">{{ auth()->user()->about }}
                            </textarea>
                            @error('about')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($message = session('error'))
                            <span class="text-danger">{{ $message }}</span>
                        @endif
                        <div class="float-right">
                            <button type="submit">Redaktə Et</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
@endsection
