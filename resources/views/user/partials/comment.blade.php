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