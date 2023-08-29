@props(['blog'])
{{-- @dd('hit') --}}

<div class="card shadow-sm text-center m-2" style="width: 18rem;">
    <img src='{{"$blog->thumbnail" ? "/storage/$blog->thumbnail" : "/storage/defaultImg/blog.jpg" }}' height="200" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $blog->title }}</h5>
        <a class="btn btn-primary my-2" href="/?category={{$blog->category->slug}}">{{ $blog->category->name }}</a>
        <div>Author - <a class=" my-2 text-decoration-none" href="/?author={{$blog->author->username}}">{{ $blog->author->name }}</a></div>
        <p class="card-text">{{ $blog->intro }}</p>
        <a href="/blogs/{{ $blog->slug }}" class="btn btn-primary">View Details</a>
    </div>
</div>