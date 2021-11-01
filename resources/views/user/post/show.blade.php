@extends('user.main_master')
@section('content')
@section('title')
    {{ $category->name }}
@endsection

<section class="breadcrumbs-area"
    style="background-image: url({{ asset('frontend/img/banner/breadcrumbs-banner.jpg') }});">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>{{ $category->name }}</h1>
            <ul>
                <li>
                    <a href="/">Ana Səhifə</a> -
                </li>
                <li>
                    <a href="{{ route('user.post.index', $category->slug) }}">{{ $category->name }}</a> -
                </li>
                <li>{!! Str::of($post->title)->limit(100) !!}</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- News Details Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 mb-30">
                <div class="news-details-layout1">
                    <input type="hidden" id="post_id" value="{{ $post->id }}">
                    <div class="position-relative mb-30">
                        <img style="width: 800px;height:400px" src="{{ asset($post->thumbnail) }}" alt="news-details"
                            class="img-fluid">
                        <div class="topic-box-top-sm">
                            <div class="topic-box-sm color-cinnabar mb-20">{{ $category->name }}</div>
                        </div>
                    </div>
                    <h2 class="title-semibold-dark size-c30">{{ $post->title }}</h2>
                    <ul class="post-info-dark mb-30">
                        <li>
                            <a href="#">
                                <span>Yazar</span> {{ $post->user->name }}</a>
                        </li>
                        <li>
                            <i class="fa fa-calendar mr-4"
                                aria-hidden="true"></i>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LL') }}
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-eye" aria-hidden="true"></i>{{ $post->view_count }}</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-comments" aria-hidden="true"></i>{{ $post->comments_count }}</a>
                        </li>
                    </ul>
                    {!! $post->content !!}
                    <ul class="blog-tags item-inline">
                        <li>Etiketlər</li>
                        @foreach ($post->tags as $tag)
                            <li>
                                <a href="#">#{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="row no-gutters divider blog-post-slider">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <a href="#" class="prev-article">
                                <i class="fa fa-angle-left" aria-hidden="true"></i>Previous article</a>
                            <h3 class="title-medium-dark pr-50">Wonderful Outdoors Experience: Eagle Spotting in Alaska
                            </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                            <a href="#" class="next-article">Next article
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>
                            <h3 class="title-medium-dark pl-50">The only thing that overcomes hard luck is hard work
                            </h3>
                        </div>
                    </div>
                    <div class="author-info p-35-r mb-50 border-all">
                        <div class="media media-none-xs">
                            <img style="width: 100px;height:100px" src="{{ asset($post->user->image) }}" alt="author"
                                class="img-fluid rounded-circle">
                            <div class="media-body pt-10 media-margin30">
                                <h3 class="size-lg mb-5">{{ $post->user->name }}</h3>
                                <div class="post-by mb-5">Vəzifə: {{ $post->user->role->name }}</div>
                                <p class="mb-15">
                                    {{ auth()->user()->about }}
                                </p>
                                <ul class="author-social-style2 item-inline">
                                    <li>
                                        <a href="#" title="facebook">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="twitter">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="google-plus">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="linkedin">
                                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" title="pinterest">
                                            <i class="fa fa-pinterest" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">{{ $post->comments->count() }} Rəy mövcuddur</h2>
                        @foreach ($post->comments as $comment)
                            <ul>
                                <li>
                                    <div class="media media-none-xs">
                                        <img style="width: 120px;height:120px"
                                            src="{{ asset($comment->user->image) }}" class="img-fluid rounded-circle"
                                            alt="comments">
                                        <div class="media-body comments-content media-margin30">
                                            <h3 class="title-semibold-dark">
                                                <a href="#">{{ $comment->user->name }} ,
                                                    <span> {{ $comment->created_at->diffForhumans() }}</span>
                                                </a>
                                            </h3>
                                            <p>
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                    <div class="leave-comments">
                        <h2 class="title-semibold-dark size-xl mb-40">Rəy Bildirin</h2>
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea placeholder="Rəyiniz..." class="form-control" id="form-message"
                                            rows="8" cols="20"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-none">
                                        <button id="send-comment" type="submit" class="btn-ftg-ptp-45 float-right">Göndər</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-5">
                        <div class="topic-box-lg color-cod-gray">Bənzər Məqalələr</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Nature</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news171.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Application</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news172.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Life Style</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news173.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Technology</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news174.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Accessories</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news175.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Model</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news176.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-5">
                        <div class="topic-box-lg color-cod-gray">Ən Son Məqalələr</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Nature</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news171.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Application</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news172.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Life Style</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news173.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Technology</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news174.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Accessories</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news175.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                            <div class="mt-25 position-relative">
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Model</div>
                                </div>
                                <a href="single-news-1.html" class="mb-10 display-block img-opacity-hover">
                                    <img src="{{ asset('frontend/img/news/news176.jpg') }}" alt="ad"
                                        class="img-fluid m-auto width-100">
                                </a>
                                <h3 class="title-medium-dark size-md mb-none">
                                    <a href="single-news-1.html">Rosie Huntington Whitl Habits Career Art.Rosie TBeauty
                                        Habits.</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Etiketlər</div>
                    </div>
                    <ul class="sidebar-tags">
                        @foreach ($tags as $tag)
                            <li>
                                <a href="#">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-30">
                        <div class="topic-box-lg color-cod-gray">Ən Çox Oxunanlar</div>
                    </div>
                    <div class="position-relative mb30-list bg-body">
                        <div class="topic-box-top-xs">
                            <div class="topic-box-sm color-cod-gray mb-20">Apple</div>
                        </div>
                        <div class="media">
                            <a class="img-opacity-hover" href="single-news-1.html">
                                <img src="{{ asset('frontend/img/news/news117.jpg') }}" alt="news"
                                    class="img-fluid">
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
                                <img src="{{ asset('frontend/img/news/news118.jpg') }}" alt="news"
                                    class="img-fluid">
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
                                <img src="{{ asset('frontend/img/news/news119.jpg') }}" alt="news"
                                    class="img-fluid">
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
                                <img src="{{ asset('frontend/img/news/news120.jpg') }}" alt="news"
                                    class="img-fluid">
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
                                <img src="{{ asset('frontend/img/news/news121.jpg') }}" alt="news"
                                    class="img-fluid">
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
            </div>
        </div>
    </div>
</section>

@endsection
