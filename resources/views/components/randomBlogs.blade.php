@props(['randomBlogs'])

<div class="my-5">
    <h2 class="text-primary my-3 text-center">Blogs You May Like</h2>
    <div class="mx-auto d-flex">
        @foreach ($randomBlogs as $randomblog)
        <div class="col-4 d-flex flex-column align-items-center ">
            <x-blog-card :blog="$randomblog" />
        </div>
        @endforeach
    </div>
</div>