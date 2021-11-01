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
                        <img style="width:200px;height:200px;object-fit" src="{{ !empty(auth()->user()->image) ? asset(auth()->user()->image) : url('backend/plugins/images/default.jpg') }}" alt="author" class="img-fluid rounded-circle">
                        <div class="media-body pt-10 media-margin30">
                            <a href="{{ route('user.profile.edit') }}" class="float-right btn btn-primary btn-lg">Redaktə Et</a>
                            <h3 class="size-lg mb-5">{{ auth()->user()->name }}</h3>
                            <div class="post-by mb-5">{{ (auth()->user()->role_id != null) ? "Vəzifə: ". auth()->user()->role->name : ''}}</div>
                            <p class="mb-15">
                                {{ auth()->user()->about }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="topic-box-lg color-cinnabar">Son Bəyəndiklərim</div>
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news132.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Apple</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">John Baldessari on designing the newest BMW art car</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news133.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Fashion</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative img-overlay-70 mb-20">
                                <img src="{{ asset('frontend/img/news/news134.jpg') }}" alt="news" class="img-fluid width-100 img-overlay-70">
                                <a class="play-btn popup-youtube" href="http://www.youtube.com/watch?v=1iIZeIy7TqM">
                                    <img src="{{ asset('frontend/img/banner/play.png') }}" alt="play" class="img-fluid">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Games</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>

                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news135.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Gadgets</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news136.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Food</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news137.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Nature</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news138.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Camera</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="mb-30">
                            <div class="position-relative mb-20">
                                <a class="img-opacity-hover" href="single-news-1.html">
                                    <img src="{{ asset('frontend/img/news/news139.jpg') }}" alt="news" class="img-fluid width-100">
                                </a>
                                <div class="topic-box-top-xs">
                                    <div class="topic-box-sm color-cod-gray mb-20">Racing</div>
                                </div>
                            </div>
                            <div class="post-date-dark">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>October 25, 2017
                                    </li>
                                </ul>
                            </div>
                            <h3 class="title-medium-dark size-lg mb-none">
                                <a href="single-news-1.html">Football meras on the backer Sathe will have theytics.</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-20-r mb-30">
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
        </div>
    </div>
</section>
@endsection
