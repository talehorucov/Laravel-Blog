@extends('user.main_master')
@section('content')
@section('title')
    Kateqoriyalar
@endsection

<section class="breadcrumbs-area"
    style="background-image: url({{ asset('frontend/img/banner/breadcrumbs-banner.jpg') }});">
    <div class="container">
        <div class="breadcrumbs-content">
            <h1>Kateqoriyalar</h1>
            <ul>
                <li>
                    <a href="/">Ana Səhifə</a> -
                </li>
                <li>Kateqoriyalar</li>
            </ul>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End Here -->
<!-- Post Style 2 Page Area Start Here -->
<section class="bg-body section-space-less30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col-sm-4 col-12">
                            <div class="position-relative mb-30">
                                <a class="img-opacity-hover" href="{{ route('user.post.index', $category->slug) }}">
                                    <img src="{{ $category->image }}" alt="news" class="img-fluid width-100 mb-15">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>
                                </div>
                                <div class="post-date-dark">
                                    <ul>
                                        <li>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span>{{ Carbon\Carbon::parse($category->created_at)->locale('az')->isoFormat('LL') }}
                                        </li>
                                    </ul>
                                </div>
                                <h3 class="title-medium-dark size-lg mb-none">
                                    <a
                                        href="{{ route('user.post.index', $category->slug) }}">{{ $category->description }}</a>
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
