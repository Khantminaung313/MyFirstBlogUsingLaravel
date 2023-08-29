<div class="border-bottom mb-3">
    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <a href="/{{$user->username}}/profile">
                <img class="rounded-circle me-4" src='{{ $user->avatar ? "/storage/$user->avatar" : "/storage/defaultImg/profile.png" }}' width="50" height="50"
                alt="">
            </a>
            <div>
                <div class="fw-bold me-2">
                    <a class="text-decoration-none text-dark" href="/{{$user->username}}/profile">{{ucwords($user->name)}}</a>
                </div>
                    <small>{{$comment->created_at->diffForHumans()}}</small>
            </div>
        </div>
        @if (auth()->user()->id == $comment->author->id)
        <div>
            <form action="/blogs/{{$comment->id}}/delete" method="POST">
                @csrf
                <button title="delete" class="border-0 bg-white">&#9587;</button>
            </form>
        </div>
        @endif
    </div>
    <div class="p-2 mt-3 ms-5">
        {{$comment->body}}
    </div>
</div>