<x-layout>
    <div class="container py-5">
        <div class="row ">
            <div class="col-8 mx-auto d-flex flex-column align-items-center my-3">
                <div class="img-box my-3">
                    <img 
                    src='{{"$blog->thumbnail" ? "/storage/$blog->thumbnail" : "/storage/defaultImg/blog.jpg" }}' alt="">
                </div>

                <div class="content-box text-center">
                    <h3 class="my-3">{{ $blog->title }}</h3>
                    <div class="mb-2">
                        <a class="btn btn-primary"
                            href="/?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a>
                    </div>
                    <div class="mb-2">
                        Author - <a href="/?author={{ $blog->author->username }}">{{ $blog->author->name }}</a>
                    </div>

                    @auth
                        <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                        @csrf
                        @if (auth()->user()->isSubscribed($blog))
                        <button class="btn btn-secondary">UnSubscribe</button>
                        @else
                        <button class="btn btn-warning">Subscribe</button>
                        @endif

                    </form>
                    @endauth

                    <p class="my-3">{!! $blog->body !!}</p>
                </div>
            </div>

            @auth
            <x-card-wrapper>
                <form action="/blogs/{{ $blog->slug }}/comment" method="POST">
                    @csrf
                    <textarea class="form-control" name="body" cols="30" rows="5" placeholder="Write a comment"></textarea>

                    <div class="text-end mt-2">
                        <button class="btn btn-primary" type="submit">Send</button>
                    </div>
                </form>
            </x-card-wrapper>
            @else
                <p class="text-center">Please<a href="{{route('login')}}">Login</a>to post your comment.</p>
            @endauth

            @if ($blog->comments->count())
                    <x-comments :blog="$blog" :comments="$blog->comments()->latest()->paginate(3)"/>
            @endif

        </div>
        <x-randomBlogs :randomBlogs="$randomBlogs" />
    </div>

</x-layout>
