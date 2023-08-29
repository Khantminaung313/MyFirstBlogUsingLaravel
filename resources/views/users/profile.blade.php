<x-layout>
    <div class="container pt-5">
        <h2 class="pt-5 text-center text-primary">{{ucwords($user->name)}}'s Profile</h2>
        <div class="row">
            <div class="col-8 mx-auto boder-1 border-info p-5">
                <div class="avatar text-center">
                    <img src='{{$user->avatar ? "/storage/$user->avatar" : "/storage/defaultImg/profile.png"}}' class="rounded" width="200px" height="200" alt="">
                </div>
    
                <ul class="col-6 mx-auto mt-5">
                    <li>Name - {{$user->name}}</li>
                    <li>Email - {{$user->email}}</li>
                    <li>Type - 
                        @if($user->is_admin)
                        <span class="text-danger">Admin</span>
                        @else
                        <span class="success text-bold">User</span>
                        @endif
                    </li>

                    <li class="d-flex justify-content-center mt-2">
                        <a class="btn btn-warning me-2" href="/{{$user->username}}/edit">Edit</a>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layout>