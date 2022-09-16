@extends('layout.DashboardAdmin')
@section('container')
@if (session()->has('CreateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Buat Aspirasi Berhasil!</strong> {{session('CreateSuccess')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row">
    @foreach($data_aspirasi as $data)
    <div class="col-md-3 col-sm-6 mb-3">
        <div class="card aspirasi">
            <div class="card-header aspirasi-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        @if ($data->user == null)
                        <a class="nav-link disabled" href="#">User tidak di ketahui</a>    
                        @else 
                        <a class="nav-link disabled" href="#">{{$data->user->name}}</a>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <a href="/admin/{{ $data->id }}/detail" class="text-decoration-none text-black">
                    <img class="img-fluid" src="{{ asset('storage/' .$data->image) }}" alt=""
                        style="width:100%; height: 150px;">
                    <h6 class="card-title mt-3">{{$data->title}}</h6>
                    <p class="card-text overflow-hidden">{{$data->content}}</p>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
