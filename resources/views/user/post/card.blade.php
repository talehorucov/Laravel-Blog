@foreach ($posts as $post)
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 burger">
        <div class="img-overlay-70 img-scale-animate mb-10">
            <img src="{{ asset($post->thumbnail) }}" alt="news" class="img-fluid width-100">
            <div class="topic-box-top-sm">
                <div class="topic-box-sm color-cod-gray mb-20">{{ $post->category->name }}</div>
            </div>
            <div class="mask-content-xs">
                <div class="post-date-light d-none d-md-block">
                    <ul>
                        <li>
                            <span>Yazar</span>
                            <a href="single-news-1.html">{{ $post->user->name }}</a>
                        </li>
                        <li>
                            <span>
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            </span>{{ Carbon\Carbon::parse($post->created_at)->locale('az')->isoFormat('LLL') }}
                        </li>
                    </ul>
                </div>
                <h3 class="title-medium-light size-lg">
                    <a href="{{ route('user.post.show', [$post->category->slug, $post->slug]) }}">
                        {{ Str::of($post->title)->limit(30) }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
@endforeach
