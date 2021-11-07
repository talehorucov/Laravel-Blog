@extends('user.main_master')
@section('content')
@section('title')
    {{ $title }}
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
                <li>{{ $title }} Başlıqlı Məqalələr</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Post Style 1 Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                            <div class="media media-none--lg mb-30">
                                <div class="position-relative width-40">
                                    <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}"
                                        class="img-opacity-hover img-overlay-70">
                                        <img src="{{ asset($post->thumbnail) }}" alt="news" class="img-fluid">
                                    </a>
                                    <div class="topic-box-top-xs">
                                        <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}</div>
                                    </div>
                                </div>
                                <div class="media-body p-mb-none-child media-margin30">
                                    <div class="post-date-dark">
                                        <ul>
                                            <li>
                                                <span>Yazar</span>
                                                <a
                                                    href="#">{{ $post->user->name }}</a>
                                            </li>
                                            <li>
                                                <span>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LLL') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="title-semibold-dark size-lg mb-15">
                                        <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h3>
                                    <p>
                                        {!! $post->content !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-20-r mb-30">
                    <div class="col-sm-6 col-12">
                        <div class="pagination-btn-wrapper text-center--xs mb15--xs">
                            <ul>
                                {{-- {{ $posts->links() }} --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ne-sidebar sidebar-break-md col-lg-4 col-md-12">
                <div class="sidebar-box">
                    <div class="topic-border color-cod-gray mb-25">
                        <div class="topic-box-lg color-cod-gray">Bütün Etiketlər</div>
                    </div>
                    <ul class="sidebar-tags">
                        @foreach ($tags as $tag)
                            <li>
                                <a href="{{ route('user.post.tag.index',$tag->slug) }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
