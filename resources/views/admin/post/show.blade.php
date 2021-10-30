@extends('admin.admin_master')
@section('content')
@section('title')
    {{ $post->name }} Məlumat
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Məqalə Haqqında</h4>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form>
                                @csrf
                                <div class="form-group">
                                    <label>Başlıq</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="ti-menu"></i></div>
                                        <input type="text" class="form-control" name="title" disabled
                                            placeholder="Məqalə başlığı" value="{{ $post->title }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="selectpicker m-r-10" data-style="btn-danger btn-outline" disabled>
                                        <option>
                                            @if ($post->publish == 0)
                                                Deaktiv
                                            @else
                                                Aktiv
                                            @endif
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kateqoriya</label>
                                    <select name="category_id" class="selectpicker m-r-10"
                                        data-style="btn-danger btn-outline" disabled>
                                        <option value="{{ $post->category->id }}">{{ $post->category->name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Şəkil</label>
                                    <div>
                                        <img style="width: 300px; height:300px" src="{{ asset($post->thumbnail) }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h3 class="box-title">Məzmun</h3>
                                    <textarea id="summernote_disable" name="content" class="summernote">
                                        {{ $post->content }}
                                    </textarea>
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
