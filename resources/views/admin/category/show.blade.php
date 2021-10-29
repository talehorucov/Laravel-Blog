@extends('admin.admin_master')
@section('content')
@section('title')
    {{ $category->name }} Məlumat
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">{{ $category->name }} Haqqında</h4>
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
                                    <label>Kateqoriya adı</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-menu"></i></div>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $category->name }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Şəkil</label>
                                    <div>
                                        <img style="width: 100px; height:100px" src="{{ $category->image }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Açıqlama</label>
                                    <div>
                                        <textarea name="description" class="form-control" rows="4"
                                            disabled> {{ $category->description }}</textarea>
                                    </div>
                                </div>
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
