@extends('admin.admin_master')
@section('content')
@section('title')
    Kateqoriyalar
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Kateqoriyalar</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('admin.categories.create') }}"
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
                    Kateqoriya Əlavə Et</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="table-responsive">
                        <table class="table table-hover manage-u-table">
                            <thead>
                                <tr>
                                    <th width="70" class="text-center">#</th>
                                    <th>ŞƏKİL</th>
                                    <th>KATEQORİYA ADI</th>
                                    <th width="300">İDARƏ ET</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($category->image) }}" style="width:50px;height:50px" alt="">
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $category->name }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', $category) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.show', $category) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-info"></i>
                                            </a>
                                            <a href="{{ route('admin.categories.destroy', $category) }}"
                                                class="btn btn-danger btn-outline btn-circle btn-lg m-r-5 delete">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
</div>

@endsection
