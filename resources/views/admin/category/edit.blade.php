@extends('admin.admin_master')
@section('content')
@section('title')
    Kateqoriya Redaktə
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Kateqoriya Redaktə Et</h4>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{ route('admin.categories.update',$category) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Kateqoriya adı</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-menu"></i></div>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Kateqoriya adı" value="{{ $category->name }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Hazırki şəkil</label>
                                    <div>
                                        <img style="width: 100px; height:100px"
                                            src="{{ $category->image }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Şəkil</label>
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
                                    <label>Açıqlama</label>
                                    <div>
                                        <textarea name="description" class="form-control"
                                            rows="4"> {{ $category->description }}</textarea>
                                    </div>
                                    @error('about')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">
                                    Redaktə Et
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
