<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/AdminStyle.css') }}">
    <!-- Script JS -->
    <script src="{{ asset('assets/script/script.js') }}"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Viga&display=swap" rel="stylesheet">

    <title>Wadah Aspirasi Masyarakat</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light  bg-white border-bottom border-5 border-warning">
        <div class="container-fluid">
            <a class="offcanvas-link fs-4 ps-4 me-2" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                aria-controls="offcanvasExample">
                <i class="bi bi-grid-fill"></i>
            </a>
            <a class="navbar-brand fs-4" href="#">Super Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-lg-none ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/superadmin">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @method('post')
                            @csrf
                            <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" data-bs-backdrop="false" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body d-flex flex-column flex-shrink-0 p-3 bg-white" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-6 fw-normal">@kalibagor_desa.id</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active text-center mb-4" aria-current="page">
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star-half"></i>
                        Wadah Aspirasi
                        <i class="bi bi-star-half"></i>
                        <i class="bi bi-star-half"></i>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown mb-1">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('storage/' .Auth::user()->image) }}" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{ Auth::user()->name }}</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="text-center">
                            <form action="/logout" method="post">
                                @method('post')
                                @csrf
                                <button type="submit" class="btn btn-rounded btn-outline-warning btn-sm">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

        </div>

    </div>

    {{-- <main> --}}
    {{-- Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="card mb-3 text-center" style="max-width: 540px;">
                <div class="">
                    <img src="{{ asset('storage/' .Auth::user()->image) }}" class="img-fluid" alt="...">
                </div>
                <div class="">
                    <div class="card-body m-0">
                        <h6 class="card-title">{{ Auth::user()->name }}</h6>
                        <p class="card-text">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    <div class="container mt-4 fw-bold border-bottom border-2 fs-5 border-5 border-bottom">
        <a class="text-decoration-none" href="">Home</a>> Halaman Mengelola User
    </div>
    <div class="container mt-5">
        @yield('container')
    </div>
    {{-- </main> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
