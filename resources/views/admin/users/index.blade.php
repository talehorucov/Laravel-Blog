@extends('admin.admin_master')
@section('content')
@section('title')
    İstifadəçilər
@endsection

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">İstifadəçilər</h4>
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
                                    <th>Ad</th>
                                    <th>EMAİL</th>
                                    <th>ŞƏKİL</th>
                                    <th>QEYDİYYAT</th>
                                    <th>VƏZİFƏ</th>
                                    <th width="300">İDARƏ ET</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>
                                            <span class="text-muted">{{ $user->name }}</span>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $user->email }}</span>
                                        </td>
                                        <td>
                                            <img src="{{ !empty($user->image) ? url('/').'/'.$user->image : url('backend/plugins/images/default.jpg') }}"
                                            style="width:50px;height:50px" alt="">
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $user->created_at }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="label label-danger">{{ $user->role->name ?? 'İstifadəçi' }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $user) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="{{ route('admin.users.show', $user) }}"
                                                class="btn btn-info btn-outline btn-circle btn-lg m-r-5">
                                                <i class="ti-info"></i>
                                            </a>
                                            <a href="{{ route('admin.user.dest', $user) }}"
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
