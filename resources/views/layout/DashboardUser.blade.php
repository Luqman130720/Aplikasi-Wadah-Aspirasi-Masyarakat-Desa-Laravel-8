<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/Style.css') }}">
    <!-- Script JS -->
    <script src="{{ asset('assets/script/script.js') }}"></script>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Viga&display=swap" rel="stylesheet">

    <title>Wadah Aspirasi Masyarakat</title>
</head>

<body class="user-dashboard">
    <nav class="navbar navbar-expand-lg navbar-light bg-light opacity-75 mb-5 border-bottom border-5">
        <div class="container-fluid">
            <a class="navbar-brand"><i class="bi bi-list" type="button" data-bs-toggle="modal"
                    data-bs-target="#Dashboard-menu"></i> Wadah Aspirasi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user/dashboard">Dashboard</a>
                    </li>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            @foreach ($category as $kategori)
                            <li><a class="dropdown-item" href="/user/category/{{ $kategori->id }}">{{ $kategori->name }}</a></li>

                            @endforeach
                        </ul>
                    </div>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/panduan">Panduan Pengguna</a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="/user/collection">Aspirasi Saya</a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="/about">Tentang Kami</a>
            </li>
            <li class="nav-item d-lg-none">
                <a class="nav-link" href="/user/info">Informasi Desa</a>
            </li>
            <li class="nav-item d-lg-none">
                <form action="/logout" method="post">
                    @method('post')
                    @csrf
                    <button type="submit" class="btn btn-outline-success btn-rounded">Logout</button>
                </form>
            </li>
            </ul>
        </div>
        </div>
    </nav>


    {{-- Modal --}}
    <div class="modal fade" id="Dashboard-menu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dashboard Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row list-menu text-center">
                            <div class="col">
                                <img src="/assets/images/aspirasi-logo.png" alt="" srcset="" width="30px"
                                    height="30px"><br>
                                <a clas="text-decoration-none" href="/user/dashboard">Dashboard</a>

                            </div>
                            <div class="col">
                                <img src="/assets/images/my-aspirasi.png" alt="" srcset="" width="30px"
                                    height="30px"><br>
                                <a clas="text-decoration-none" href="/user/collection">Aspirasi Saya</a>

                            </div>
                            <div class="col">
                                <img src="/assets/images/about-us.png" alt="" srcset="" width="30px" height="30px"><br>
                                <a clas="text-decoration-none" href="/about">Tentang Kami</a>
                            </div>
                            <div class="col">
                                <img src="/assets/images/kalibagor-image.png" alt="" srcset="" width="30px"
                                    height="30px"><br>
                                <a clas="text-decoration-none" href="/user/info">Informasi Desa</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-6 text-user">
                        <img src="{{ asset('storage/' .Auth::user()->image) }}" class="img-rounded" alt="" srcset=""
                            width="30px" height="30px">
                        {{ Auth::user()->name }}
                    </div>
                    <div class="col text-end">
                        <form action="/logout" method="post">
                            @method('post')
                            @csrf
                            <button type="submit" class="btn btn-rounded btn-outline-warning">Logout</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    <div class="container mb-5" style="min-height: 65vh">
        @yield('container')
    </div>


    <footer class="py-2 my-0 bg-light">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/user/dashboard" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="/user/collection" class="nav-link px-2 text-muted">My Aspirasi</a></li>
            <li class="nav-item"><a href="/about" class="nav-link px-2 text-muted">About us</a></li>
            <li class="nav-item"><a href="/user/info" class="nav-link px-2 text-muted">Info</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">contacts</a></li>
        </ul>
        <p class="text-center text-muted">© 2022 Wadah Aspirasi Masyarakat, Kelurahan Kalibagor</p>
    </footer>


    <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
        <div class="offcanvas-body small">
            <h5 class="offcanvas-title" id="offcanvasBottomLabel">contacs</h5>
            <i class="bi bi-envelope-fill"> pemdeskalibagor@gmail.com</i><br>
            <i class="bi bi-facebook"> https://www.facebook.com/pemdes.kalibagor</i><br>
            <i class="bi bi-twitter"> https://twitter.com/desakalibagor</i><br>
            <i class="bi bi-instagram"> https://www.instagram.com/desa_kalibagor/?hl=id</i><br>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
