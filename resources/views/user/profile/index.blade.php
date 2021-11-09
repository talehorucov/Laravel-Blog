@extends('user.main_master')
@section('content')
@section('title')
    Hesabım
@endsection

<section class="breadcrumbs-area"
    style="background-image: url({{ asset('frontend/img/banner/breadcrumbs-banner.jpg') }});">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>{{ auth()->user()->name }}</h1>
            <ul>
                <li>
                    <a href="/">Ana Səhifə</a> -
                </li>
                <li>Hesabım</li>
            </ul>
        </div>
    </div>
</section>
<!-- Author Post Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="bg-accent p-35-r mb-50 item-shadow-1">
                    <div class="media media-none-xs">
                        <img style="width:200px;height:200px;object-fit"
                            src="{{ !empty(auth()->user()->image) ? asset(auth()->user()->image) : url('backend/plugins/images/default.jpg') }}"
                            alt="author" class="img-fluid rounded-circle">
                        <div class="media-body pt-10 media-margin30">
                            <a href="{{ route('user.profile.edit') }}"
                                class="float-right btn btn-primary btn-lg">Redaktə Et</a>
                            <h3 class="size-lg mb-5">{{ auth()->user()->name }}</h3>
                            <div class="post-by mb-5">
                                {{ auth()->user()->role_id != null ? 'Vəzifə: ' . auth()->user()->role->name : '' }}
                            </div>
                            <p class="mb-15">
                                {{ auth()->user()->about }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="topic-box-lg color-cinnabar">Son Bəyəndiklərim</div>
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-sm-4 col-12">
                            <div class="mb-30">
                                <div class="position-relative mb-20">
                                    <a class="img-opacity-hover"
                                        href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                        <img src="{{ asset($post->thumbnail) }}" alt="news"
                                            class="img-fluid width-100">
                                    </a>
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}
                                        </div>
                                    </div>
                                </div>
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>{{ $post->star->created_at->diffForHumans() }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark size-lg mb-none">
                                    <a
                                        href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">{{ $post->title }}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
