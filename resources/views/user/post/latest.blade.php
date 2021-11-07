@extends('user.main_master')
<!-- Slider Area Start Here -->
@section('content')
@section('title')
    Məqalələr
@endsection
<section class="breadcrumbs-area"
    style="background-image: url({{ asset('frontend/img/banner/breadcrumbs-banner.jpg') }});">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Məqalələr</h1>
            <ul>
                <li>
                    <a href="/">Ana Səhifə</a> -
                </li>
                <li>Ən Son Məqalələr</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Post Style 3 Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                @foreach ($posts as $post)
                    <div class="position-relative mb-50-r">
                        <a class="img-opacity-hover"
                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                            <img src="{{ $post->thumbnail }}" alt="news" class="img-fluid width-100 mb-30">
                        </a>
                        <div class="topic-box-top-lg">
                            <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}</div>
                        </div>
                        <div class="post-date-dark">
                            <ul>
                                <li>
                                    <span>Yazar</span>
                                    <a href="single-news-1.html">{{ $post->user->name }}</a>
                                </li>
                                <li>
                                    <span>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LL') }}
                                </li>
                            </ul>
                        </div>
                        <h3 class="title-medium-dark size-c26">
                            <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p>
                            {!! Str::of($post->content)->limit(200) !!}
                        </p>
                        <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}"
                            class="btn-ftf-dtp-52">Daha Ətraflı</a>
                    </div>
                @endforeach
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Ən Çox Oxunanlar</div>
                    </div>
                    @foreach ($mostview_posts as $post)
                        <div class="position-relative mb30-list bg-body">
                            <div class="topic-box-top-xs">
                                <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}</div>
                            </div>
                            <div class="media">
                                <a class="img-opacity-hover"
                                    href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                    <img style="width: 150px;height:120px" src="{{ $post->thumbnail }}" alt="news"
                                        class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LLL') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark mb-none">
                                        <a
                                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">{{ $post->title }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Etiketlər</div>
                    </div>
                    <ul class="sidebar-tags">
                        @foreach ($tags as $tag)
                            <li>
                                <a href="{{ route('user.post.tag.index', $tag->slug) }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
