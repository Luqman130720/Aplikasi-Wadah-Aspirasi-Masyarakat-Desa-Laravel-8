@extends('layout.DashboardAdmin')
@section('container')
<div class="container">
    <div class="row border-bottom border-5 mb-5">
        <div class="col subtitle">
            <ul class="list-group fw-bold">
                <a class="text-decoration-none fs-6" href="">Home ></a>
            </ul>
            <ul class="list-group fw-bold fs-4">
                CREATE ASPIRASI
            </ul>

        </div>
        <div class="col text-end m-1">
            <a href="/user/create">
                <button type="button" class="btn btn-rounded btn-warning"><i class="bi bi-send-plus me-2"></i>Buat
                    Aspirasi
                </button>
            </a>
        </div>
    </div>
</div>
<div class="container aspirasi bg-white mb-5">
    <form action="/admin/edit/{{ $aspirasi->id}}" method="post" enctype="multipart/form-data" class="row g-3">
        @method('put')
        @csrf
        <h5 class="card-title text-center">Update Aspirasi</h5>
        <h6 class="card-subtitle mb-4 text-center">"Kami tidak bisa mengubah arah angin <br> namun kami bisa
            menyesuaikan pelayaran kami untuk selalui menggapai tujuan kita bersama"</h6>
        <h6 class="card-subtitle mb-5 text-center">"Masukan Aspirasimu Untuk Membangun Desa Ini Menjadi Lebih Baik"</h6>
        
        <div class="col-lg-6">
            <div class="mb-4 ps-lg-3 mt-3 row">
                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-input" @error('title') is-invalid @enderror id="title"
                        name="title" required value="{{ old('title',$aspirasi->title) }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 ps-lg-3 row">
                <label for="content" class="col-sm-2 col-form-label">Aspirasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control form-input" @error('content') is-invalid @enderror
                        id="content" name="content" required value="{{ old('content',$aspirasi->content) }}">
                    @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-4 ps-lg-3 row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input class="form-control form-input" @error('image') is-invalid @enderror type="file" id="image"
                        name="image" onchange="previewImage()">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

        </div>
        <div class="card mx-auto d-block mb-3" style="width: 20rem;">
            <div class="card-body">
                @if ($aspirasi->image)
                    <img src="{{ asset('storage/' .$aspirasi->image) }}" class="img-preview " width="270" height="150">
                @else
                    <img class="img-preview" width="270" height="150">
                @endif
            </div>
        </div>

        <div class="d-grid col-lg-3 mt-5 mx-auto">
            <button class="btn btn-outline-light btn-rounded mb-5 bg-primary" type="submit"><i
                    class="bi bi-send-plus me-2"></i>Update Aspirasi</button>
        </div>
    </form>
</div>

@endsection
