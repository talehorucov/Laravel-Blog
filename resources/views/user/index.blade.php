@extends('user.main_master')
<!-- Slider Area Start Here -->
@section('content')
@section('title')
    Ana Səhifə
@endsection
<section class="section-space-bottom">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-xl-8 col-lg-12">
                <div class="main-slider1 img-overlay-slider">
                    <div class="bend niceties preview-1">
                        <div id="ensign-nivoslider-3" class="slides">
                            <img src="{{ asset('frontend/img/banner/slide1.jpg') }}" alt="slider"
                                title="#slider-direction-1" />
                            <img src="{{ asset('frontend/img/banner/slide1.jpg') }}" alt="slider"
                                title="#slider-direction-2" />
                            <img src="{{ asset('frontend/img/banner/slide1.jpg') }}" alt="slider"
                                title="#slider-direction-3" />
                        </div>
                        <!-- direction 1 -->
                        <div id="slider-direction-1" class="t-cn slider-direction">
                            <div class="slider-content s-tb slide-1">
                                <div class="title-container s-tb-c">
                                    <div class="text-left pl-50 pl20-xs">
                                        <div class="topic-box-sm color-cinnabar mb-20">Beef Pizza</div>
                                        <div class="post-date-light d-none d-sm-block">
                                            <ul>
                                                <li>
                                                    <span>by</span>
                                                    <a href="single-news-1.html">Adams</a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fas fa-calendar" aria-hidden="true"></i>
                                                    </span>March 22, 2017
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="slider-title">Dhakaika Boti kebab is here summer drinks Recipe by
                                            Healthy Kadai</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- direction 2 -->
                        <div id="slider-direction-2" class="t-cn slider-direction">
                            <div class="slider-content s-tb slide-1">
                                <div class="title-container s-tb-c">
                                    <div class="text-left pl-50 pl20-xs">
                                        <div class="topic-box-sm color-cinnabar mb-20">Beef Pizza</div>
                                        <div class="post-date-light d-none d-sm-block">
                                            <ul>
                                                <li>
                                                    <span>by</span>
                                                    <a href="single-news-1.html">Adams</a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fas fa-calendar" aria-hidden="true"></i>
                                                    </span>March 22, 2017
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="slider-title">Dhakaika Boti kebab is here summer drinks Recipe by
                                            Healthy Kadai</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- direction 3-->
                        <div id="slider-direction-3" class="t-cn slider-direction">
                            <div class="slider-content s-tb slide-1">
                                <div class="title-container s-tb-c">
                                    <div class="text-left pl-50 pl20-xs">
                                        <div class="topic-box-sm color-cinnabar mb-20">Beef Pizza</div>
                                        <div class="post-date-light d-none d-sm-block">
                                            <ul>
                                                <li>
                                                    <span>by</span>
                                                    <a href="single-news-1.html">Adams</a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fas fa-calendar" aria-hidden="true"></i>
                                                    </span>March 22, 2017
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="slider-title">Dhakaika Boti kebab is here summer drinks Recipe by
                                            Healthy Kadai</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="item-box-light-md-less30 ie-full-width">
                    <div class="row">
                        @foreach ($random_posts as $post)
                            <div class="media mb-30 col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                <a class="img-opacity-hover"
                                    href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                    <img style="width:124px;height:88px" src="{{ asset($post->thumbnail) }}"
                                        alt="news" class="img-fluid">
                                </a>
                                <div class="media-body media-padding5">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fas fa-calendar" aria-hidden="true"></i>
                                                </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LLL') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a
                                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">{{ Str::of($post->title)->limit(40) }}</a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Slider Area End Here -->
<!-- Random 6 Posts Area Start Here -->
<section class="section-space-bottom">
    <div class="container">
        <div class="item-box-light-md-less10">
            <div class="ne-isotope-all">
                <div class="topic-border color-cinnabar mb-30">
                    <div class="topic-box-lg color-cinnabar">Məqalələr</div>
                    <div class="isotope-classes-tab isotop-btn mr-5">
                        <button type="button" class="btn btn-link post-card-all" onclick="postCardAll()">Hamısı</button>
                        @foreach ($categories->take(6) as $category)
                            <button type="button" id="{{ $category->slug }}" class="btn btn-link post-card"
                                style="text-decoration: none" onclick="postCard(this.id)">{{ $category->name }}
                            </button>
                        @endforeach
                        {{-- <a href="#" data-filter=".desert">desert</a>
                        <a href="#" data-filter=".drinks">drinks</a>
                        <a href="#" data-filter=".fast-food">fast-food</a>
                        <a href="#" data-filter=".desert">desert</a> --}}
                    </div>
                    <div class="more-info-link">
                        <a href="post-style-1.html">Daha çox
                            <i class="fas fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="row tab-space5 featuredContainer" id="postall">
                    {{-- <div class="col-lg-4 col-md-6 col-sm-6 col-12 burger">
                        <div class="img-overlay-70 img-scale-animate mb-10">
                            <img src="{{ asset('frontend/img/news/news304.jpg') }}" alt="news"
                                class="img-fluid width-100">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cod-gray mb-20">Burger</div>
                            </div>
                            <div class="mask-content-xs">
                                <div class="post-date-light d-none d-md-block">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">Adams</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>March 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light size-lg">
                                    <a href="single-news-1.html">Quick Tips: Cling Wrap Hack One Pot Chef</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 desert">
                        <div class="img-overlay-70 img-scale-animate mb-10">
                            <img src="{{ asset('frontend/img/news/news305.jpg') }}" alt="news"
                                class="img-fluid width-100">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cod-gray mb-20">Desert</div>
                            </div>
                            <div class="mask-content-xs">
                                <div class="post-date-light d-none d-md-block">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">Adams</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>March 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light size-lg">
                                    <a href="single-news-1.html">Bread medu vada recipe Hebbars Kitchen</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 drinks">
                        <div class="img-overlay-70 img-scale-animate mb-10">
                            <img src="{{ asset('frontend/img/news/news306.jpg') }}" alt="news"
                                class="img-fluid width-100">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cod-gray mb-20">Drinks</div>
                            </div>
                            <div class="mask-content-xs">
                                <div class="post-date-light d-none d-md-block">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">Adams</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>March 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light size-lg">
                                    <a href="single-news-1.html">Healthy Spinach Pasta With Exotic Vegetables</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 fast-food">
                        <div class="img-overlay-70 img-scale-animate mb-10">
                            <img src="{{ asset('frontend/img/news/news308.jpg') }}" alt="news"
                                class="img-fluid width-100">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cod-gray mb-20">Fast Food</div>
                            </div>
                            <div class="mask-content-xs">
                                <div class="post-date-light d-none d-md-block">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">Adams</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>March 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light size-lg">
                                    <a href="single-news-1.html">Sushi Rice with Salmon and Vegetables</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 burger">
                        <div class="img-overlay-70 img-scale-animate mb-10">
                            <img src="{{ asset('frontend/img/news/news313.jpg') }}" alt="news"
                                class="img-fluid width-100">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cod-gray mb-20">Burger</div>
                            </div>
                            <div class="mask-content-xs">
                                <div class="post-date-light d-none d-md-block">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">Adams</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>March 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light size-lg">
                                    <a href="single-news-1.html">Quick Tips: Cling Wrap Hack One Pot Chef</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 desert">
                        <div class="img-overlay-70 img-scale-animate mb-10">
                            <img src="{{ asset('frontend/img/news/news314.jpg') }}" alt="news"
                                class="img-fluid width-100">
                            <div class="topic-box-top-sm">
                                <div class="topic-box-sm color-cod-gray mb-20">Desert</div>
                            </div>
                            <div class="mask-content-xs">
                                <div class="post-date-light d-none d-md-block">
                                    <ul>
                                        <li>
                                            <span>by</span>
                                            <a href="single-news-1.html">Adams</a>
                                        </li>
                                        <li>
                                            <span>
                                                <i class="fas fa-calendar" aria-hidden="true"></i>
                                            </span>March 22, 2017
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-light size-lg">
                                    <a href="single-news-1.html">Bread medu vada recipe Hebbars Kitchen</a>
                                </h3>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Area End Here -->
<!-- All Posts Area Start Here -->
<section class="section-space-bottom">
    <div class="container">
        <div class="item-box-light-md-less10">
            <div class="ne-isotope-all">
                <div class="topic-border color-cinnabar mb-30">
                    <div class="topic-box-lg color-cinnabar">Ən Son Məqalələr</div>
                    <div class="more-info-link">
                        <a href="{{ route('user.post.latest') }}">Daha çox
                            <i class="fas fa-angle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="row tab-space5 featuredContainer">
                    @foreach ($posts->sortByDesc('id')->take(6) as $post)
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="img-overlay-70 img-scale-animate mb-10">
                                <img style="width: 600px;height:220px;object-fit" src="{{ asset($post->thumbnail) }}"
                                    alt="news" class="img-fluid width-100">
                                <div class="topic-box-top-sm">
                                    <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}</div>
                                </div>
                                <div class="mask-content-xs">
                                    <div class="post-date-light d-none d-md-block">
                                        <ul>
                                            <li>
                                                <span>Yazar</span>
                                                <a href="#">{{ $post->user->name }}</a>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fas fa-calendar" aria-hidden="true"></i>
                                                </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LLL') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-light size-lg">
                                        <a
                                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">{{ Str::of($post->title)->limit(30) }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- All Posts Area Start Here -->
<!-- Latest Comments Area Start Here -->
<section class="section-space-bottom-less30">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12 mb-30">
                <div class="item-box-light-md-less30 ie-full-width">
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg color-cinnabar">Son Rəylər</div>
                    </div>
                    <div class="row">
                        @foreach ($comments as $comment)
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="media media-none--md mb-30">
                                    <div class="position-relative width-40">
                                        <a href="{{ route('user.post.show', [$comment->post->category->slug, $comment->post->slug]) }}" class="img-opacity-hover">
                                            <img src="{{ asset($comment->post->category->image) }}" alt="news"
                                                class="img-fluid" style="width:300px;height:150px">
                                        </a>
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">{{ $comment->post->category->name }}</div>
                                        </div>
                                    </div>
                                    <div class="media-body p-mb-none-child media-margin30">
                                        <div class="post-date-dark">
                                            <ul>
                                                <li>
                                                    <span>Yazan</span>
                                                    <a href="#">{{ $comment->user->name }}</a>
                                                </li>
                                                <li>
                                                    <span>
                                                        <i class="fas fa-calendar" aria-hidden="true"></i>
                                                    </span>{{ Carbon\Carbon::parse($comment->created_at)->locale('az')->isoFormat('LLL') }}
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="title-semibold-dark size-lg mb-15">
                                            <a href="{{ route('user.post.show', [$comment->post->category->slug, $comment->post->slug]) }}">{{ Str::of($comment->post->title)->limit(30) }}</a>
                                        </h3>
                                        <p>
                                            {{ Str::of($comment->content)->limit(200) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-lg col-xl-4 col-lg-12">
                <div class="sidebar-box item-box-light-md-less30">
                    <ul class="btn-tab item-inline block-xs nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#recent" data-toggle="tab" aria-expanded="true" class="active">Recent</a>
                        </li>
                        <li class="nav-item">
                            <a href="#popular" data-toggle="tab" aria-expanded="false">Popular</a>
                        </li>
                        <li class="nav-item">
                            <a href="#common" data-toggle="tab" aria-expanded="false">Common</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active show" id="recent">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Food</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news298.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Pizza</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news299.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Chines</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news300.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Drinks</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news301.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Fastfood</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news302.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Desert</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news303.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="popular">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Chines</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news300.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Drinks</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news301.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Food</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news298.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Pizza</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news299.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Fastfood</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news302.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Desert</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news303.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="common">
                            <div class="row">
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Fastfood</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news302.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Desert</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news303.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Food</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news298.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Pizza</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news299.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Chines</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news300.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">Rosie Hutin ghton Habits Career.</a>
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-6 mb-25">
                                    <div class="position-relative">
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">Drinks</div>
                                        </div>
                                        <a href="single-news-1.html" class="img-opacity-hover">
                                            <img src="{{ asset('frontend/img/news/news301.jpg') }}" alt="news"
                                                class="img-fluid width-100 mb-10">
                                        </a>
                                        <h3 class="title-medium-dark size-sm mb-none">
                                            <a href="single-news-1.html">3 Students Arrested After Body.</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Articles Area End Here -->
<!-- Category Area Start Here -->
<section class="bg-body section-space-less10">
    <div class="container">
        <div class="topic-border color-cinnabar mb-30">
            <div class="topic-box-lg color-cinnabar">Kateqoriyalar</div>
            <div class="more-info-link">
                <a href="{{ route('user.category.index') }}">Daha çox
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="row tab-space5">
            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="category-box-layout1 overlay-dark-level-2 img-grayscale-hover text-center mb-10">
                        <img src="{{ $category->image }}" alt="category" class="img-fluid width-100">
                        <div class="content p-30-r">
                            <div class="ctg-title-xs">{{ $category->name }}</div>
                            <h3 class="title-regular-light size-lg">
                                <a
                                    href="{{ route('user.post.index', $category->slug) }}">{{ $category->description }}</a>
                            </h3>
                            <div class="post-date-light d-block d-sm-none d-md-block">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fas fa-calendar" aria-hidden="true"></i>
                                        </span>{{ Carbon\Carbon::parse($category->created_at)->locale('az')->isoFormat('LL') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
<!-- Category Area End Here -->
