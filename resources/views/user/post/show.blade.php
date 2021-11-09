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
                        <li>
                            <a href="#">
                                <i class="fas fa-star" aria-hidden="true"></i><span
                                    class="like-count">{{ $post->stars_count }}</span> </a>
                        </li>
                    </ul>
                    {!! $post->content !!}
                    <ul class="blog-tags item-inline">
                        <li>Etiketlər</li>
                        @foreach ($post->tags->take(6) as $tag)
                            <li>
                                <a href="{{ route('user.post.tag.index', $tag->slug) }}">#{{ $tag->name }}</a>
                            </li>
                        @endforeach
                        <li style="float: right">
                            <button id="like" class="btn-lg btn-primary" type="submit"><i
                                    class="fas fa-star"></i>{{ $check_star ? ' Bəyənmə' : ' Bəyən' }}</button>
                        </li>
                    </ul>
                    <div class="row no-gutters divider blog-post-slider">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            @isset($previousPost)
                                <a href="{{ route('user.post.show', [$previousPost->category->slug, $previousPost->slug]) }}"
                                    class="prev-article">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>Öncəki Məqalə</a>
                                <h3 class="title-medium-dark pr-50">{{ $previousPost->title }}
                                </h3>
                            @endisset
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 text-right">
                            @isset($nextPost)
                                <a href="{{ route('user.post.show', [$nextPost->category->slug, $nextPost->slug]) }}"
                                    class="next-article">Növbəti Məqalə
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                                <h3 class="title-medium-dark pl-50">{{ $nextPost->title }}
                                </h3>
                            @endisset
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
                                    {{ $post->user->about }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="comments-area">
                        <h2 class="title-semibold-dark size-xl border-bottom mb-40 pb-20">
                            {{ $post->comments->count() }} Rəy mövcuddur</h2>
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
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea placeholder="Rəyiniz..." class="form-control" id="form-message" rows="8"
                                        cols="20"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-none">
                                    <button id="send-comment" type="submit"
                                        class="btn-ftg-ptp-45 float-right">Göndər</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-5">
                        <div class="topic-box-lg color-cod-gray">Bənzər Məqalələr</div>
                    </div>
                    <div class="row">
                        @foreach ($similar_posts as $post)
                            <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                <div class="mt-25 position-relative">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}
                                        </div>
                                    </div>
                                    <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}"
                                        class="mb-10 display-block img-opacity-hover">
                                        <img style="width: 150px; height:120px" src="{{ asset($post->thumbnail) }}"
                                            alt="ad" class="img-fluid m-auto width-100">
                                    </a>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a
                                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                            {{ Str::of($post->title)->limit(20) }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-5">
                        <div class="topic-box-lg color-cod-gray">Ən Son Məqalələr</div>
                    </div>
                    <div class="row">
                        @foreach ($latest_posts as $post)
                            <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                <div class="mt-25 position-relative">
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}
                                        </div>
                                    </div>
                                    <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}"
                                        class="mb-10 display-block img-opacity-hover">
                                        <img style="width: 150px; height:120px" src="{{ asset($post->thumbnail) }}"
                                            alt="ad" class="img-fluid m-auto width-100">
                                    </a>
                                    <h3 class="title-medium-dark size-md mb-none">
                                        <a
                                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                            {{ Str::of($post->title)->limit(20) }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
                                    <img style="width: 150px; height:120px" src="{{ asset($post->thumbnail) }}"
                                        alt="news" class="img-fluid">
                                </a>
                                <div class="media-body">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LL') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="title-medium-dark mb-none">
                                        <a
                                            href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">{{ Str::of($post->title) }}</a>
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

@endsection
