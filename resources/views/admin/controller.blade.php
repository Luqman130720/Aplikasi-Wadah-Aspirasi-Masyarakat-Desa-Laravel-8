@extends('layout.DashboardAdmin')
@section('container')
<div class="overflow-scroll">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-3">Gambar Aspirasi</th>
                <th scope="col">Topik</th>
                <th scope="col">Pengirim</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        @if (session()->has('UpdateSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Update Berhasil!</strong> {{session('UpdateSuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('DeleteSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hapus Berhasil!</strong> {{session('DeleteSuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <tbody>
            <div class="row">
                @foreach($aspirasi as $data)
                <tr>
                    <td><img src="{{ asset('storage/' .$data->image) }}" width="200" height="100" class="" alt=""></td>
                    <td>{{$data->title}}</td>
                    <td>{{$data->user->name}}</td>
                    <td>{{$data->content}}</td>
                    <td>
                        <div class="d-grid gap-2 d-flex justify-content-md-end">
                            <a style="" href="/admin/aspirasi/{{ $data->id }}/edit">
                                <button class="btn btn-sm btn-success mt-1" type="button">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                            </a>

                            <form action="/delete/{{ $data->id }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn border-3 btn-sm rounded btn-outline-danger" type="submit"
                                    onclick="return confirm('Apakah kamu yakin akan menghapus aspirasi ini?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </div>
        </tbody>
    </table>
</div>
@endsection
