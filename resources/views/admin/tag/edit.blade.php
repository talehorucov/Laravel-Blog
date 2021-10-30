@extends('admin.admin_master')
@section('content')
@section('title')
    Etiket Redaktə
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Etiket Redaktə Et</h4>
            </div>
        </div>
        <!--.row-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Etiket adı</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fas fa-tag"></i></div>
                                        <input type="text" class="form-control" name="name" placeholder="Etiket adı"
                                            value="{{ $tag->name }}">
                                    </div>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" style="float: right"
                                    class="btn btn-success waves-effect waves-light m-r-10">
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
