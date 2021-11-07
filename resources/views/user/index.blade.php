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
                            @foreach ($random_posts as $post)
                                <img src="{{ asset($post->thumbnail) }}" alt="slider"
                                    title="#slider-direction-{{ $post->id }}" />
                            @endforeach
                        </div>
                        <!-- direction 1 -->
                        @foreach ($random_posts as $post)
                            <div id="slider-direction-{{ $post->id }}" class="t-cn slider-direction">
                                <div class="slider-content s-tb slide-1">
                                    <div class="title-container s-tb-c">
                                        <div class="text-left pl-50 pl20-xs">
                                            <div class="topic-box-sm color-cinnabar mb-20">{{ $post->category->name }}
                                            </div>
                                            <div class="post-date-light d-none d-sm-block">
                                                <ul>
                                                    <li>
                                                        <span>Yazar</span>
                                                        <a href="single-news-1.html">{{ $post->user->name }}</a>
                                                    </li>
                                                    <li>
                                                        <span>
                                                            <i class="fas fa-calendar" aria-hidden="true"></i>
                                                        </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LL') }}
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="slider-title">
                                                {{ Str::of($post->title)->limit(100) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
<!-- Latest Posts Area Start Here -->
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
<!-- Latest Posts Area Start Here -->

<!-- Most Views Posts Area Start Here -->
<section class="section-space-bottom">
    <div class="container">
        <div class="item-box-light-md-less10">
            <div class="ne-isotope-all">
                <div class="topic-border color-cinnabar mb-30">
                    <div class="topic-box-lg color-cinnabar">Ən Çox Oxunan Məqalələr</div>
                </div>
                <div class="row tab-space5 featuredContainer">
                    @foreach ($mostview_posts as $post)
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
<!-- Most Views Posts Area Start Here -->

<!-- Latest Comments Area Start Here -->
<section class="section-space-bottom-less30">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 mb-30">
                <div class="item-box-light-md-less30 ie-full-width">
                    <div class="topic-border color-cinnabar mb-30">
                        <div class="topic-box-lg color-cinnabar">Ən Son Rəylər</div>
                    </div>
                    <div class="row">
                        @foreach ($comments as $comment)
                            <div class="col-lg-12 col-md-6 col-sm-12">
                                <div class="media media-none--md mb-30">
                                    <div class="position-relative width-40">
                                        <a href="{{ route('user.post.show', [$comment->post->category->slug, $comment->post->slug]) }}"
                                            class="img-opacity-hover">
                                            <img src="{{ asset($comment->post->category->image) }}" alt="news"
                                                class="img-fluid" style="width:300px;height:150px">
                                        </a>
                                        <div class="topic-box-top-xs">
                                            <div class="topic-box-sm color-cod-gray mb-20">
                                                {{ $comment->post->category->name }}</div>
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
                                            <a
                                                href="{{ route('user.post.show', [$comment->post->category->slug, $comment->post->slug]) }}">{{ Str::of($comment->post->title)->limit(30) }}</a>
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
