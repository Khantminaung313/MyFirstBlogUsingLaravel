
<div class="dropdown my-4">
    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ (isset($currentCategory))? "$currentCategory->name" : "Filter By Category" }}
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/">All</a></li>
        @foreach ($categories as $category)
            <li><a class="dropdown-item" href="/?category={{$category->slug}}">{{$category->name}}</a></li>
        @endforeach
    </ul>
</div>

