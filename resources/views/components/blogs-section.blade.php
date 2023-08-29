@props(['blogs', 'currentCategory'])

<section class="main py-5 text-center" id="Blog">
    <div class="container text-center">
        <h1 class="text-center my-5">MY BLOGS</h1>
        <x-category-dropdown currentCategory="$currentCategory"/>
        <div class="row">
            @foreach ($blogs as $blog)
            <div class="col-4 d-flex flex-column align-items-center ">
                <x-blog-card :blog="$blog" />
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">{{ $blogs->links() }}</div>
        </div>
    </div>
</section>

