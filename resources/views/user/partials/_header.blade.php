<header>
    <div id="header-layout2" class="header-style7">
        <div class="header-top-bar">
            <div class="top-bar-top bg-primarytextcolor border-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12">
                            <ul class="news-info-list text-center--md">
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>Azərbaycan, Bakı
                                </li>
                                <li>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>{{ Carbon\Carbon::now()->locale('az')->isoFormat('LL') }}
                                </li>
                                <li>
                                    <i class="fa fa-clock-o"
                                        aria-hidden="true"></i>{{ Carbon\Carbon::now()->toTimeString()}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <ul class="header-social">
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
                                <li>
                                    <a href="#" title="rss">
                                        <i class="fa fa-rss" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="vimeo">
                                        <i class="fa fa-vimeo" aria-hidden="true"></i>
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
                            <a href="index.html" class="img-fluid">
                                <img src="{{ asset('frontend/img/logo-dark.png') }}" alt="logo"
                                    class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block position-static min-height-none">
                        <div class="ne-main-menu">
                            <nav id="dropdown">
                                <ul>
                                    <li class="active">
                                        <a href="#">Home</a>
                                        <ul class="ne-dropdown-menu">
                                            <li>
                                                <a href="index.html">Home 1</a>
                                            </li>
                                            <li>
                                                <a href="index2.html">Home 2</a>
                                            </li>
                                            <li>
                                                <a href="index3.html">Home 3</a>
                                            </li>
                                            <li>
                                                <a href="index4.html">Home 4</a>
                                            </li>
                                            <li>
                                                <a href="index5.html">Home 5</a>
                                            </li>
                                            <li>
                                                <a href="index6.html">Home 6</a>
                                            </li>
                                            <li class="active">
                                                <a href="index7.html">Home 7</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Post</a>
                                        <ul class="ne-dropdown-menu">
                                            <li>
                                                <a href="post-style-1.html">Post Style 1</a>
                                            </li>
                                            <li>
                                                <a href="post-style-2.html">Post Style 2</a>
                                            </li>
                                            <li>
                                                <a href="post-style-3.html">Post Style 3</a>
                                            </li>
                                            <li>
                                                <a href="post-style-4.html">Post Style 4</a>
                                            </li>
                                            <li>
                                                <a href="single-news-1.html">News Details 1</a>
                                            </li>
                                            <li>
                                                <a href="single-news-2.html">News Details 2</a>
                                            </li>
                                            <li>
                                                <a href="single-news-3.html">News Details 3</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Pages</a>
                                        <ul class="ne-dropdown-menu">
                                            <li>
                                                <a href="author-post.html">Author Post Page</a>
                                            </li>
                                            <li>
                                                <a href="archive.html">Archive Page</a>
                                            </li>
                                            <li>
                                                <a href="gallery-style-1.html">Gallery Style 1</a>
                                            </li>
                                            <li>
                                                <a href="gallery-style-2.html">Gallery Style 2</a>
                                            </li>
                                            <li>
                                                <a href="404.html">404 Error Page</a>
                                            </li>
                                            <li>
                                                <a href="contact.html">Contact Page</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="post-style-1.html">Politics</a>
                                    </li>
                                    <li>
                                        <a href="post-style-2.html">Business</a>
                                    </li>
                                    <li>
                                        <a href="post-style-3.html">Sports</a>
                                    </li>
                                    <li>
                                        <a href="post-style-4.html">Fashion</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 text-right position-static">
                        <div class="header-action-item on-mobile-fixed">
                            <ul>
                                <li>
                                    <form id="top-search-form" class="header-search-dark">
                                        <input type="text" class="search-input" placeholder="Search...." required=""
                                            style="display: none;">
                                        <button class="search-button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </li>
                                <li class="d-none d-sm-block d-md-block d-lg-none">
                                    <button type="button" class="login-btn" data-toggle="modal"
                                        data-target="#myModal">
                                        <i class="fa fa-user" aria-hidden="true"></i>Sign in
                                    </button>
                                </li>
                                <li>
                                    <div id="side-menu-trigger" class="offcanvas-menu-btn offcanvas-btn-repoint">
                                        <a href="#" class="menu-bar">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <a href="#" class="menu-times close">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
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
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="topic-box">Top Stories</div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8 col-7">
                <div class="feeding-text-light2">
                    <ol id="sample" class="ticker">
                        <li>
                            <a href="#">McDonell Kanye West highlights difficulties for celebritiesComplimentary decor
                                and
                                design advicewith Summit Park homes</a>
                        </li>
                        <li>
                            <a href="#">Magnificent Image Of The New Hoover Dam Bridge Taking Shape</a>
                        </li>
                        <li>
                            <a href="#">If Obama Had Governed Like This in 2017 He'd Be the Transformational.</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- News Feed Area End Here -->
