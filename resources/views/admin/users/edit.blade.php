@extends('admin.admin_master')
@section('content')
@section('title')
    {{ $user->name }} Redaktə Et
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">İstifadəçi Redaktə Et</h4>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{ route('admin.users.update', $user) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>İstidaçi adı</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="İstifadəçi adı" value="{{ $user->name }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            value="{{ $user->email }}">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Vəzifə</label>
                                    <select name="role_id" class="selectpicker m-r-10"
                                        data-style="btn-danger btn-outline">
                                        <option value="">İstifadəçi</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $role->id == $user->role_id ? 'selected' : '' }}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Hazırki Şəkli</label>
                                    <div>
                                        <img style="width: 100px; height:100px" src="{{ !empty($user->image) ? asset($user->image) : url('backend/plugins/images/default.jpg') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Yeni Profil Şəkli</label>
                                    <div>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"> <i
                                                    class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                    class="fileinput-filename"></span></div> <span
                                                class="input-group-addon btn btn-default btn-file"> <span
                                                    class="fileinput-new">Şəkil seçin</span> <span
                                                    class="fileinput-exists">Dəyiş</span>
                                                <input type="file" name="image"> </span> <a href="#"
                                                class="input-group-addon btn btn-default fileinput-exists"
                                                data-dismiss="fileinput">Sil</a>
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <div>
                                        <textarea name="about" class="form-control"
                                            rows="5"> {{ $user->about }}</textarea>
                                    </div>
                                    @error('about')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                    Düzənlə
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
