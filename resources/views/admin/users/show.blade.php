@extends('admin.admin_master')
@section('content')
@section('title')
    İstifadəçilər
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">İstifadəçi Haqqında</h4>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form>
                                <div class="form-group">
                                    <label>İstidaçi adı</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-user"></i></div>
                                        <input disabled type="text" class="form-control" name="name"
                                            placeholder="İstifadəçi adı" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-email"></i></div>
                                        <input type="email" class="form-control" name="email" placeholder="Email"
                                            value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Vəzifə</label>
                                    <select disabled name="role_id" class="selectpicker m-r-10"
                                        data-style="btn-danger btn-outline">
                                        <option>{{ $user->role->name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Şəkli</label>
                                    <div>
                                        <img style="width: 100px; height:100px"
                                            src="{{ !empty($user->image) ? url('/') . '/' . $user->image : url('backend/plugins/images/default.jpg') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Text area</label>
                                    <div>
                                        <textarea disabled name="about" class="form-control"
                                            rows="5"> {{ $user->about }}</textarea>
                                    </div>
                                </div>
                            </formype=>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
