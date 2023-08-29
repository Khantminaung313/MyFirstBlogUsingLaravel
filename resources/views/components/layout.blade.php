<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/app.css">
</head>

<body>
    <section class="nav-bar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary d-flex align-items-center">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">My Blog</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/">Home</a>
                        </li>

                        @auth
                            @can('admin')
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="/admin/blogs/index">Dashboard</a>
                                </li>
                            @endcan
                        @endauth

                        <li class="nav-item">
                            <a class="nav-link" href="#Blog">Blogs</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">Logout</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" title="profile" href="/{{auth()->user()->username}}/profile">
                                        {{ auth()->user()->name }}
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth


                        <li class="nav-item">
                            <form action="/" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search..." name="search"
                                        value="{{ request('search') }}">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    {{ $slot }}

    <section class="footer py-3 bg-secondary">
        <h4>Thanks For Watching</h4>
        <p>If you have any question, </p>
        <a class="btn btn-primary" href="mailto:khantminaung313@gmail.com">Contact me</a>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/script.js"></script>

</body>

</html>
