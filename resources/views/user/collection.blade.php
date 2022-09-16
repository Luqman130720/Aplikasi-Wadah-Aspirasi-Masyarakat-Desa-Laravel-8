@extends('layout.DashboardUser')
@section('container')
<div class="container">
    <div class="row border-bottom border-5 mb-5">
        <div class="col subtitle">
            <ul class="list-group fw-bold">
                <a class="text-decoration-none fs-6" href="">
                    Home >
                </a>
            </ul>
            <ul class="list-group fw-bold fs-4">
                MY ASPIRATION
            </ul>

        </div>
        <div class="col text-end m-1">
            <a href="/user/create">
                <button type="button" class="btn btn-rounded btn-warning">
                    <i class="bi bi-send-plus me-2"></i>
                    Buat Aspirasi
                </button>
            </a>
        </div>
    </div>
</div>

@if (session()->has('UpdateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Update Berhasil!</strong> {{session('UpdateSuccess')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('destroy'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {{session('destroy')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row">
    @foreach($aspirasi as $my_aspirasi)
    @if ($my_aspirasi->user->id == Auth::user()->id)
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card aspirasi">
            <div class="card-body">
                <img class="img-fluid" src="{{ asset('storage/' .$my_aspirasi->image) }}" alt=""
                    style="width:100%; height: 150px;">
                <div class="card-img-overlay">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a style="" href="/aspirasi/{{ $my_aspirasi->id }}/edit">
                            <button class="btn btn-sm btn-success mt-1" type="button">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </a>

                        <form action="/delete/{{ $my_aspirasi->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger mt-1" onclick="return confirm('Apakah kamu yakin?')"
                                type="submit"><i class="bi bi-trash"></i></button>
                        </form>

                        <a style="" href="/user/{{ $my_aspirasi->id }}/detail">
                            <button class="btn btn-warning btn-sm mt-1 me-2" type="button">
                                detail
                            </button>
                        </a>

                    </div>
                </div>
                <small class="card-text m-0">{{ $my_aspirasi->created_at->diffForHumans()}}</small>
                <h6 class="card-title mt-1 m-0">{{$my_aspirasi->title}}</h6>
                <p class="card-text overflow-hidden mb-3">{{$my_aspirasi->content}}</p>
            </div>
        </div>
    </div>

    @endif
    @endforeach
</div>
@endsection
