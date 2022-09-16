@extends('layout.DashboardUser')
@section('container')
<div class="container">
    <div class="row border-bottom border-5 mb-5">
        <div class="col subtitle">
            <ul class="list-group fw-bold">
                <a class="text-decoration-none fs-6" href="">Home ></a>
            </ul>
            <ul class="list-group fw-bold fs-4">
                Halaman Dashboard
            </ul>

        </div>
        <div class="col text-end m-1">
            <a href="/user/create">
                <button type="button" class="btn btn-rounded btn-warning"><i class="bi bi-send-plus me-2"></i>Buat
                    Aspirasi</button></a>
        </div>
    </div>
</div>
@if (session()->has('CreateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Aspirasi telah berhasil dibuat!</strong> {{session('CreateSuccess')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('UpdateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Update Berhasil!</strong> {{session('UpdateSuccess')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    @foreach($aspirasi as $aspirasi_masyarakat)
    <div class="col-md-3 col-sm-6 mb-3 ">

        <div class="card aspirasi ">
            <div class="card-header aspirasi-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item d-flex">
                        @if ($aspirasi_masyarakat->user == null)
                        <img src="https://www.kelaspintar.id/blog/wp-content/uploads/2021/11/Gunung-Kerinci.jpg"
                            height="25" width="25" class="img-rounded" alt="">
                        @else
                        <img src="{{ asset('storage/' .$aspirasi_masyarakat->user->image) }}" height="25" width="25"
                            class="img-rounded" alt="">
                        @endif
                        <div class="d-flex flex-column">
                            <small class="text-muted ps-2">
                                @if ($aspirasi_masyarakat->user == null)
                                User tidak di ketahui
                                @else
                                {{ $aspirasi_masyarakat->user->name }}
                                @endif
                            </small>
                            <small class="card-text ps-2">{{ $aspirasi_masyarakat->created_at->diffForHumans()}}</small>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="card-body">

                <img class="img-fluid img-dash" src="{{ asset('storage/' .$aspirasi_masyarakat->image) }}" alt=""
                    style="width:100%; height: 150px;">
                <h6 class="card-title mt-3 m-0" type="submit">{{$aspirasi_masyarakat->title}}</h6>
                <p class="card-text overflow-hidden mb-3">{{$aspirasi_masyarakat->content}}</p>

                <div class=" text-center pt-2 border-top">
                    <div class="row">
                        <a class="text-decoration-none" href="/user/{{ $aspirasi_masyarakat->id }}/detail">
                            <div class="d-grid">
                                <button
                                    class="btn-sm btn-outline-success btn-rounded"><strong>selengkapnya</strong></button>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @endforeach
</div>
@endsection
