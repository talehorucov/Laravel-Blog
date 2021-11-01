@foreach ($categories as $category)
    <div class="col-lg-4 col-md-6 col-sm-6 col-12 all">
        <div class="img-overlay-70 img-scale-animate mb-10">
            <img src="{{ asset($category->latest_post->thumbnail) }}" alt="news" class="img-fluid width-100">
            <div class="topic-box-top-sm">
                <div class="topic-box-sm color-cod-gray mb-20">{{ $category->name }}</div>
            </div>
            <div class="mask-content-xs">
                <div class="post-date-light d-none d-md-block">
                    <ul>
                        <li>
                            <span>Yazar</span>
                            {{-- <a href="single-news-1.html">{{ $category->latest_post->user->name }}</a> --}}
                        </li>
                        <li>
                            <span>
                                <i class="fas fa-calendar" aria-hidden="true"></i>
                            {{-- </span>{{ Carbon\Carbon::parse($category->latest_post->created_at)->locale('az')->isoFormat('LLL') }} --}}
                        </li>
                    </ul>
                </div>
                <h3 class="title-medium-light size-lg">
                    {{-- <a href="{{ route('user.post.show', [$category->latest_post->category->slug, $category->latest_post->slug]) }}">
                        {{ Str::of($category->latest_post->title)->limit(30) }}
                    </a> --}}
                </h3>
            </div>
        </div>
    </div>
@endforeach
