@extends('admin.admin_master')
@section('content')
@section('title')
    Məqalələr
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Məqalələr</h4>
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
                                    <th>YAZAR</th>
                                    <th>BAŞLIQ</th>
                                    <th>Kateqoriya</th>
                                    <th>STATUS</th>
                                    <th width="300">İDARƏ ET</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset($post->thumbnail) }}" style="width:50px;height:50px"
                                                alt="">
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $post->user->name }}</span>
                                        </td>
                                        <td style="vertical-align:middle">
                                            <span class="text-muted">{{ Str::of($post->title)->limit(20) }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge badge-pill badge-info">{{ $post->category->name }}</span>
                                        </td>
                                        <td>
                                            @if ($post->publish == 0)
                                                <span class="badge badge-pill badge-danger">Deaktiv</span>
                                            @else
                                                <span class="badge badge-pill badge-success">Aktiv</span>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.posts.show', $post) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-info"></i>
                                            </a>
                                            @if ($post->publish == 0)
                                                <a href="{{ route('admin.posts.active', $post) }}"
                                                    class="btn btn-success btn-outline btn-circle btn-lg m-r-5 delete">
                                                    <i class="ti-stats-up"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.posts.inactive', $post) }}"
                                                    class="btn btn-danger btn-outline btn-circle btn-lg m-r-5 publish">
                                                    <i class="ti-stats-down"></i>
                                                </a>
                                            @endif
                                            <a href="{{ route('admin.posts.destroy', $post) }}"
                                                class="btn btn-danger btn-outline btn-circle btn-lg m-r-5 publish">
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
