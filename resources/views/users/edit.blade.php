<x-layout>
    <div class="container pt-5">
        <h2 class="pt-5 text-center text-primary">{{ucwords($user->name)}}'s Profile</h2>
        <div class="row">
            <div class="col-8 mx-auto boder-1 border-info p-5">
                <div class="avatar text-center">
                    <img src='{{$user->avatar ? "/storage/$user->avatar" : "/storage/defaultImg/profile.png"}}' class="rounded" width="200px" height="200" alt="">
                </div>
    
                <form action="/{{$user->username}}/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div>
                        <x-input-label for="name" :value="_('name')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name', $user->name)" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="_('Email')" />
                        <x-text-input id="email" class="form-control" type="text" name="email" :value="old('email', $user->email)" autofocus autocomplete="email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="avatar" :value="_('avatar')" />
                        <x-text-input id="avatar" class="form-control" type="file" name="avatar" :value="old('avatar')"/>
                        <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                    </div>
            
                    <button class="btn btn-primary mt-3" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>