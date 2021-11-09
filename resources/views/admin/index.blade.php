@extends('admin.admin_master')
@section('content')
@section('title')
    Ana Səhifə
@endsection
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Toplam İstifadəçi</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash"></div>
                        </li>
                        <li class="text-right"><span class="counter text-success">{{ $user_count }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Toplam Məqalə</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash3"></div>
                        </li>
                        <li class="text-right"><i class="ti-arrow-up text-info"></i> <span
                                class="counter text-info">{{ $post_count }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Toplam Oxunma</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash2"></div>
                        </li>
                        <li class="text-right"><span class="counter text-purple">{{ $viewpost_count }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Toplam Kateqoriya</h3>
                    <ul class="list-inline two-part">
                        <li>
                            <div id="sparklinedash4"></div>
                        </li>
                        <li class="text-right"><span class="counter text-danger">{{ $category_count }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.row -->
        <!--row -->
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12 col-lg-8 col-sm-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Ən Yeni Məqalələr</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>BAŞLIQ</th>
                                    <th>YAZAR</th>
                                    <th>STATUS</th>
                                    <th>TARİX</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($new_posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="txt-oflo">{{ Str::of($post->title)->limit(30) }}</td>
                                        <td><span class="text-success">{{ $post->user->name }}</span></td>
                                        <td>
                                            @if ($post->publish == 0)
                                                <span class="label label-danger label-rouded"> Deaktiv
                                                </span>
                                            @else
                                                <span class="label label-success label-rouded"> Aktiv
                                                </span>
                                            @endif
                                        </td>
                                        <td class="txt-oflo">{{ $post->created_at->diffForhumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-sm-12 col-xs-12">
                <div class="panel">
                    <div class="p-20">
                        <div class="row">
                            <div class="col-xs-8">
                                <h4 class="m-b-0">Ən Yeni İstifadəçilər</h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer bg-extralight">
                        <ul class="earning-box">
                            @foreach ($new_users as $user)
                                <li>
                                    <div class="er-row">
                                        <div class="er-pic"><img
                                                src="{{ !empty($user->image) ? asset($user->image) : url('backend/plugins/images/default.jpg') }}"
                                                alt="image" width="60" class="img-circle"></div>
                                        <div class="er-text">
                                            <h3>{{ $user->name }}</h3><span
                                                class="text-muted">{{ Carbon\Carbon::parse($user->created_at)->locale('az')->isoFormat('LL') }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent comment, table & feed widgets -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-6 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Ən Yeni Rəylər</h3>
                    <div class="comment-center p-t-10">
                        @foreach ($new_comments as $comment)
                            <div class="comment-body b-none">
                                <div class="user-img"> <img
                                        src="{{ !empty($comment->user->image) ? asset($comment->user->image) : url('backend/plugins/images/default.jpg') }}"
                                        alt="user" class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>{{ $comment->user->name }}</h5><span
                                        class="time">{{ Carbon\Carbon::parse($comment->created_at)->locale('az')->isoFormat('LLL') }}</span>
                                    <br /><span class="mail-desc">
                                        {{ $comment->content }}
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Kateqoriyalar</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>KATEQORİYA</th>
                                    <th>AÇIQLAMA</th>
                                    <th>YARANMA TARİXİ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="txt-oflo">{{ $category->name }}</td>
                                        <td>
                                            <span
                                                class="label label-success label-rouded">{{ Str::of($category->description)->limit(20) }}
                                            </span>
                                        </td>
                                        <td class="txt-oflo">{{ $category->created_at->diffForHumans() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
