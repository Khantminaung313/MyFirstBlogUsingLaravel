<x-admin-layout>

    <h2 class="text-center">Blog Create Form</h2>

    <form action="/admin/blogs/store" method="POST" enctype="multipart/form-data" class="p-3">
        @csrf
        <div>
            <x-input-label for="title" :value="_('Title')" />
            <x-text-input id="title" class="form-control" type="text" name="title" :value="old('title')" autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="intro" :value="_('Intro')" />
            <x-text-input id="intro" class="form-control" type="text" name="intro" :value="old('intro')" autofocus autocomplete="intro" />
            <x-input-error :messages="$errors->get('intro')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="slug" :value="_('Slug')" />
            <x-text-input id="slug" class="form-control" type="text" name="slug" :value="old('slug')" autofocus autocomplete="slug" />
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="body" :value="_('Body')" />
            <textarea class="form-control editor" name="body" id="body" cols="30" rows="10" value="{{old('body')}}"></textarea>
            <x-input-error :messages="$errors->get('body')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="thumbnail" :value="_('Thumbnail')" />
            <x-text-input id="thumbnail" class="form-control" type="file" name="thumbnail" :value="old('thumbnail')"/>
            <x-input-error class="mt-2" :messages="$errors->get('thumbnail')" />
        </div>

        <div>
            <x-input-label for="category" :value="_('Category')" />
            <select class="form-control" name="category_id" id="category">
                @foreach ($categories as $category)
                    <option {{$category->id == old('category_id') ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>



        <button class="btn btn-primary mt-3" type="submit">Create</button>
    </form>

</x-admin-layout>