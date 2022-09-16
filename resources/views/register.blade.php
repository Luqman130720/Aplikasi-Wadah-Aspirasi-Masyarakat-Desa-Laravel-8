<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/Style.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Viga&display=swap" rel="stylesheet">
    <!-- Script JS -->
    <script src="{{ asset('assets/script/script.js') }}"></script>

    <title>Wadah Aspirasi Masyarakat</title>
</head>

<body class="registration">
    <nav class="navbar ps-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Wadah Aspirasi</a>
        </div>
    </nav>

    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Selamat!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('LoginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('LoginError')}}</strong> Masukan username dan password dengan benar
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('LogoutSuccess'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{session('LogoutSuccess')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="jumbotron  text-center bg-light opacity-75">
            <h1 class="display-4 pt-5">Selamat Datang</h1>
            <p class="lead">Sistem Informasi Wadah Aspirasi Kelurahan Kalibagor</p>
            <hr class="my-4">
            <p class="moto">"Kemajuan tidak mungkin dicapai tanpa perubahan <br> dan mereka yang tidak dapat berubah
                pikiran
                tidak dapat mengubah apa pun"</p>
            <p class="moto-2">Berikan Aspirasimu Untuk Membuat Kemajuan Di Desa Ini</p>
            <a class="btn btn-outline-success btn-rounded btn-lg mt-3 mb-5" data-bs-toggle="modal"
                data-bs-target="#modal-login" role="button">Login Disini</a>
        </div>
    </div>

    <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/login" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username :</label>
                            <input type="text" name="username" class="form-control form-input" id="" @error('username')
                                is-invalid @enderror required value="{{ old('username') }}">

                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password :</label>
                            <input type="password" name="password" class="form-control form-input" id="" required>
                        </div>
                        <div class="mb-3">
                            <p>Belum Punya Akun?
                                <a class="" data-bs-toggle="modal" data-bs-target="#modal-register" role="button">Daftar
                                    Disini</a>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-rounded">Sign In</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modal-register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="/register" method="post" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name :</label>
                            <input type="text" name="name" class="form-control form-input  @error('name') is-invalid
                            @enderror" id="name" required value="{{ old('name') }}">

                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="col-form-label">Username :</label>
                            <input type="text" name="username" class="form-control form-input @error('username') is-invalid
                            @enderror" id="username" required value="{{ old('username') }}">

                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email :</label>
                            <input type="email" name="email" class="form-control form-input @error('email') is-invalid
                            @enderror" id="email" required value="{{ old('email') }}">

                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password :</label>
                            <input type="password" name="password" class="form-control form-input @error('password') is-invalid
                            @enderror" id="password" required value="{{ old('password') }}">

                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 ">
                            <label for="image" class="col-form-label">Avatar :</label>
                            <img class="img-preview mx-auto register-foto d-block mb-5">
                            <input name="image" class="form-control" type="file" id="image" onchange="previewImage()">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-rounded">Sign UP</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
