@extends('admin.admin_master')
@section('content')
@section('title')
    Məqalə Redaktə Et
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Məqalə Redaktə Et</h4>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{ route('admin.posts.update', $post) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Başlıq</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-menu"></i></div>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Məqalə başlığı" value="{{ $post->title }}">
                                    </div>
                                    @error('title')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Kateqoriya</label>
                                    <select name="category_id" class="selectpicker m-r-10"
                                        data-style="btn-danger btn-outline">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $post->category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Hazırki Şəkil</label>
                                    <div>
                                        <img style="width: 300px; height:300px" src="{{ asset($post->thumbnail) }}">
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
                                                <input type="file" name="thumbnail"> </span> <a href="#"
                                                class="input-group-addon btn btn-default fileinput-exists"
                                                data-dismiss="fileinput">Sil</a>
                                        </div>
                                    </div>
                                    @error('thumbnail')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <h3 class="box-title">Məzmun</h3>
                                    <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                    @error('content')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
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
