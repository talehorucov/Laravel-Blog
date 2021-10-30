@extends('admin.admin_master')
@section('content')
@section('title')
    Etiketlər
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Etiketlər</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ route('admin.tags.create') }}"
                    class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">
                    Etiket Əlavə Et</a>
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
                                    <th style="text-align: center">Etiket</th>
                                    <th style="text-align: center" width="300">İDARƏ ET</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td style="text-align: center; font-size:17px">
                                            <span class="text-muted">{{ $tag->name }}</span>
                                        </td>
                                        <td style="text-align: center">
                                            <a href="{{ route('admin.tags.edit', $tag) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.tags.destroy', $tag) }}"
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
