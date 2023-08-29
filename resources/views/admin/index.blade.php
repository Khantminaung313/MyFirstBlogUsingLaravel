<x-admin-layout>
    <h4 class="py-2 text-center text-info">Manage Blogs</h4>

    <table class="table table-bordered table-striped table-hover my-3">
        <thead>
            <tr>
                <th class="text-center" scope="col">Title</th>
                <th class="text-center" scope="col">Intro</th>
                <th class="text-center" scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td class="text-center" scope="row">
                        <a class="text-decoration-none text-dark" href="/blogs/{{$blog->slug}}">{{ $blog->title }}</a>
                    </td>
                    <td class="text-center">{{ $blog->intro }}</td>
                    <td class="text-center">
                        <a href="/admin/blogs/{{$blog->slug}}/edit" class="btn btn-warning">Edit</a>
                    </td>
                    <td class="text-center">
                        <form action="/admin/blogs/{{$blog->slug}}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{$blogs->links()}}
    </div>

</x-admin-layout>
