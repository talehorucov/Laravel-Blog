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
                <li>Ən Məqalələr</li>
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
                        <a class="img-opacity-hover" href="{{ route('user.post.show',[$post->category->slug,$post->slug]) }}">
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
                            <a href="{{ route('user.post.show',[$post->category->slug,$post->slug]) }}">
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
                <div class="row mb-30">
                    <div class="col-sm-6 col-12">
                        <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                            <ul>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li>
                                    <a href="#">4</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-12">
                        <div class="pagination-result text-right pt-10 text-center--xs">
                            <p class="mb-none">Page 1 of 4</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Most Reviews</div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Apple</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="img/news/news117.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>February 10, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-2.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Gadgets</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-2.html">
                                <img src="img/news/news118.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>June 06, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-3.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Software</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-3.html">
                                <img src="img/news/news119.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>August 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-1.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Tech</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="img/news/news120.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>February 10, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-2.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Ipad</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="img/news/news121.jpg" alt="news" class="img-fluid">
                            </a>
                            <div class="media-body">
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>February 10, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark mb-none">
                                    <a href="single-news-2.html">Can Be Monit roade year with Program.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Tags</div>
                    </div>
                    <ul class="sidebar-tags">
                        @foreach ($tags as $tag)
                            <li>
                                <a href="#">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
