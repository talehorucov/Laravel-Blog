@php
$categories = App\Models\Category::all();
$posts = App\Models\Post::with('category')
    ->orderByDesc('id')
    ->take(3)
    ->get();
@endphp
<header>
    <div id="header-layout2" class="header-style7">
        <div class="header-top-bar">
            <div class="top-bar-top bg-primarytextcolor border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <ul class="news-info-list text-center--md">
                                <li>
                                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>Azərbaycan, Bakı
                                </li>
                                <li>
                                    <i class="fas fa-calendar-alt"
                                        aria-hidden="true"></i>{{ Carbon\Carbon::now()->locale('az')->isoFormat('LL') }}
                                </li>
                                <li>
                                    <i class="fas fa-clock"
                                        aria-hidden="true"></i>{{ Carbon\Carbon::now()->toTimeString() }}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <ul class="header-social">
                                <li>
                                    <a href="#" title="facebook">
                                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="twitter">
                                        <i class="fab fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="google-plus">
                                        <i class="fab fa-google-plus-g" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="linkedin">
                                        <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area bg-body border-bottom" id="sticker">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center">
                    <div class="col-lg-2 col-md-2 d-none d-lg-block">
                        <div class="logo-area">
                            <a href="/" class="img-fluid">
                                <img src="{{ asset('frontend/img/logo-dark.png') }}" alt="logo"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block position-static min-height-none">
                        <div class="ne-main-menu">
                            <nav id="dropdown">
                                <ul>
                                    @foreach ($categories->take(6) as $category)
                                        <li>
                                            <a
                                                href="{{ route('user.post.index', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 text-right position-static">
                        <div class="header-action-item on-mobile-fixed">
                            <ul>
                                <li>
                                    <form id="top-search-form" method="GET" action="{{ route('user.post.search') }}"
                                        class="header-search-dark">
                                        <input id="search-input" type="text" class="search-input" placeholder="Axtar..." required
                                            style="display: none;" name="search">
                                    </form>
                                    <button id="search-button" class="search-button">
                                        <i class="fas fa-search" aria-hidden="true"></i>
                                    </button>
                                </li>
                                <li>
                                    @auth
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger btn-lg dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Hesabım
                                            </button>
                                            <div style="font-size: 13px" class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('user.profile.index') }}">Hesabım</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ route('user.logout') }}">Çıxış</a>
                                            </div>
                                        </div>
                                    @else
                                        <a href="{{ route('user.loginForm') }}" class="login-btn">
                                            <i class="fas fa-user" aria-hidden="true"></i>Daxil Ol
                                        </a>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- News Feed Area Start Here -->
<section class="container">
    <div class="bg-body-color ml-15 pr-15 mb-10 mt-10">
        <div class="row no-gutters d-flex align-items-center">
            <div class="col-lg-3 col-md-3 col-sm-4 col-5">
                <div class="topic-box">Ən Yeni Məqalələr</div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-7">
                <div class="feeding-text-light2">
                    <ol id="sample" class="ticker">
                        @foreach ($posts as $post)
                            <li>
                                <a
                                    href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">{{ $post->title }}</a>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Feed Area End Here -->
