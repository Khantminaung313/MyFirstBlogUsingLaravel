<x-layout>

    <div class="container pt-5">
        <div class="row">
            <div class="col-2 pt-5">
                <h4 class="pb-3 text-center text-primary">Admin Dashboard</h4>
                <ul class="list-group ">
                    <li class="list-group-item ">
                        <a class="text-decoration-none" href="/admin/blogs/index">Manage Blogs</a>
                    </li>
                    <li class="list-group-item">
                        <a class="text-decoration-none" href="/admin/blogs/create">Create Blog</a>
                    </li>
                    <li class="list-group-item">
                        <a class="text-decoration-none" href="/admin/users/usersManage">Manage User</a>
                    </li>
                  </ul>
            </div>
            <div class="col-10 pt-5">
                {{ $slot }}
            </div>
        </div>
    </div>


</x-layout>


