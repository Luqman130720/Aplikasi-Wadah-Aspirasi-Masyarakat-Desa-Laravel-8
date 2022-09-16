@extends('layout.DashboardUser')
@section('container')
<div class="container">
    <div class="row border-bottom border-5 mb-5">
        <div class="col subtitle">
            <ul class="list-group fw-bold">
                <a class="text-decoration-none fs-6" href="">Home ></a>
            </ul>
            <ul class="list-group fw-bold fs-4">
                BUAT ASPIRASI
            </ul>

        </div>
    </div>
</div>
<div class="container aspirasi bg-white mb-5">
    <form action="/user/create" method="post" enctype="multipart/form-data" class="row g-3">
        @method('post')
        @csrf
        <h5 class="card-title text-center">Masukan Aspirasi</h5>
        <h6 class="card-subtitle mb-4 text-center">"Kami tidak bisa mengubah arah angin <br> namun kami bisa
            menyesuaikan pelayaran kami untuk selalui menggapai tujuan kita bersama"</h6>
        <h6 class="card-subtitle mb-5 text-center">"Masukan Aspirasimu Untuk Membangun Desa Ini Menjadi Lebih Baik"</h6>
        <div class="col-lg-6">
            <div class="mb-4 ps-lg-3 mt-3 row">
                <label for="category" class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                    <select name="category_id" id="" class="form-control">
                        <option value="">- Pilih Kategori</option>
                        @foreach ($category as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                            
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-4 ps-lg-3 mt-3 row">
                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control form-input" id="title"
                        placeholder="Masukan topik aspirasi yang akan disampaikan" @error('title') is-invalid
                        @enderror required value="{{ old('title') }}">
                        
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
                    <input type="text" name="content" class="form-control form-input"
                        placeholder="Deskripsikan aspirasi yang akan anda sampaikan" id="content" @error('content') is-invalid
                        @enderror required value="{{ old('content') }}">

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
                    <input class="form-control form-input" name="image" type="file" id="image"
                        onchange="previewImage()">
                </div>
            </div>

        </div>
        {{-- <div class="col bg-danger"> --}}
        <div class="card mx-auto d-block mb-3" style="width: 20rem;">
            <div class="card-body">
                <img class="img-preview" width="270" height="150">
            </div>
        </div>

        {{-- </div> --}}

        <div class="d-grid col-lg-3 mt-5 mx-auto">
            <button class="btn btn-outline-light btn-rounded mb-5 bg-primary" type="submit">
                <i class="bi bi-send-plus me-2"></i>Kirim Aspirasimu</button>
        </div>
    </form>
</div>

@endsection
