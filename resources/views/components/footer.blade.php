<footer>
    <div class="footer-area-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h2 class="title-bold-light title-bar-left text-uppercase">Ən Çox Oxunanlar</h2>
                        <ul class="most-view-post">
                            @foreach ($mostview_posts as $post)
                                <li>
                                    <div class="media">
                                        <a href="{{ route('user.post.show',[$post->category->slug,$post->slug]) }}">
                                            <img width="100px; height:100px" src="{{ asset($post->thumbnail) }}"
                                                alt="post" class="img-fluid">
                                        </a>
                                        <div class="media-body">
                                            <h3 class="title-medium-light size-md mb-10">
                                                <a href="{{ route('user.post.show',[$post->category->slug,$post->slug]) }}">{{ Str::of($post->title)->limit(70) }}</a>
                                            </h3>
                                            <div class="post-date-light">
                                                <ul>
                                                    <li>
                                                        <span>
                                                            <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                                        </span>{{ $post->created_at->diffForhumans() }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h2 class="title-bold-light title-bar-left text-uppercase">Populyar Kateqoriyalar</h2>
                        <ul class="popular-categories">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('user.post.index', $category->slug) }}">{{ $category->name }}
                                        <span>{{ $category->posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-box">
                        <h2 class="title-bold-light title-bar-left text-uppercase">Məqalə Şəkilləri</h2>
                        <ul class="post-gallery shine-hover ">
                            @foreach ($galleries->take(9) as $gallery)
                                <li>
                                    <figure>
                                        <img src="{{ asset($gallery->thumbnail) }}" alt="post" class="img-fluid"
                                            width="100px;height:100px">
                                    </figure>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
