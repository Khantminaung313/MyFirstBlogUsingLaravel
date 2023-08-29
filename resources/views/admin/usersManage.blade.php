<x-admin-layout>

    <h2 class="text-center text-info">User Manage</h2>

    <table class="table table-bordered table-striped table-hover my-3 text-center">
        <thead>
            <tr >
                <th  scope="col">Name</th>
                <th  scope="col">Email</th>
                <th  scope="col">Role</th>
                <th  scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="row">
                        <a class="text-decoration-none text-success" href="/users/{{$user->username}}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->is_admin)
                            <small class="text-danger">Admin</small>
                        @else
                            <small class="text-primary">User</small>
                        @endif
                    </td>
                    <td>
                        <form action="/admin/users/{{$user->username}}/delete" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="d-flex justify-content-center">
        {{$users->links()}}
    </div> --}}

</x-admin-layout>