<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YouBook</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="/">YouBook</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    @if (session()->has('user'))
                    <li class="nav-item">
                        <a class="nav-link" href="/reservations">Reservations</a>
                    </li>
                    @if (session('user')->role_id == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/addbook">Add Book</a>
                    </li>
                    @elseif (session('user')->role_id == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="/bookslist">Books List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/userslist">Users List</a>
                    </li>
                </ul>
                @endif

                <div class="d-flex text-light me-2">
                    <span class="nav-link active" aria-current="page">- {{ session('user')->name }} -</span>
                </div>


                <div class="d-flex text-light me-2">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link active" aria-current="page">Logout</button>
                    </form>
                </div>
                @else
                <div class="d-flex text-light me-2">
                    <a class="nav-link active" aria-current="page" href="/register">Register</a>
                </div>
                <div class="d-flex text-light me-2">
                    <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </div>
                @endif

            </div>
        </div>
    </nav>



    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>