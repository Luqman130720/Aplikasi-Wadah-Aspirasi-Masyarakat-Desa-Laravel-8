@extends('layout.DashboardUser')
@section('container')
<div class="container">
    <div class="row border-bottom border-5 mb-5">
        <div class="col subtitle">
            <ul class="list-group fw-bold">
                <a class="text-decoration-none fs-6" href="">Home ></a>
            </ul>
            <ul class="list-group fw-bold fs-4">
                DETAIL ASPIRASI
            </ul>

        </div>
    </div>
</div>

<div class="card">
    <div class="row">
        <div class="col-sm-6">
            <img src="{{ asset('storage/' .$aspirasi->image) }}" class="img-fluid">
        </div>

        <div class="col-sm-6">
            <div class="card-body p-0 pt-2">
                <div class="d-flex mb-4">
                @if ($aspirasi->user == null)
                <img src="https://www.kelaspintar.id/blog/wp-content/uploads/2021/11/Gunung-Kerinci.jpg" height="25"
                    width="25" class="img-rounded" alt="">
                @else
                <img src="{{ asset('storage/' .$aspirasi->user->image) }}" height="25" width="25" class="img-rounded"
                    alt="">
                @endif
                <div class="d-flex flex-column">
                    <strong class="ps-2">
                        @if ($aspirasi->user == null)
                        User tidak di ketahui
                        @else
                        {{ $aspirasi->user->name }}
                        @endif
                    </strong>
                    <small class="card-text ps-2">{{ $aspirasi->created_at->diffForHumans()}}</small>
                </div>

                </div>
                <h5 class="card-title">
                    {{ $aspirasi->title }}
                </h5>

                <p class="card-text">{{ $aspirasi->content }}</p>

                <a class="card-text text-decoration-none me-2">{{ $aspirasi->created_at->diffForHumans()}}</a>

                <a class="text-decoration-none" href="/like/{{$aspirasi->id}}"><i
                        class="bi bi-hand-thumbs-up me-1 mb-3"></i>{{$like }} like</a>
                <a class="text-decoration-none ms-2 mb-3" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">komentar</a>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                    aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                        <h6 id="offcanvasRightLabel">Form Komentar</h6>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close">
                        </button>
                    </div>

                    <div class="offcanvas-body">
                        <form action="/komentar" method="post" class="mb-3">
                            @csrf
                            <input type="hidden" name="aspirasi_id" value="{{ $aspirasi->id }}" id="">
                            <input type="hidden" name="parent_id" value="0" id="">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="">
                            <div class="input-group">
                                <span class="input-group-text bg-white"
                                    style="border-top-left-radius: 15px;border-bottom-left-radius: 15px;"><img
                                        src="{{ asset('storage/' .Auth::user()->image) }}" class="img-rounded"
                                        width="25" height="25" alt="" srcset="">
                                </span>

                                <input type="text" name="konten" class="form-control"
                                    placeholder="tambahkan komentar...">
                                <span class="input-group-text"
                                    style="border-top-right-radius: 15px;border-bottom-right-radius: 15px;">

                                    <button type="submit" class="btn btn-outline-success btn-sm">
                                        <i class="bi bi-send-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        @foreach ($comments->where('parent_id', '0') as $comment)
                        <div class="card border-0">
                            <div class="row">
                                <div class="col-1"><img src="{{ asset('storage/' .$comment->user->image) }}" height="25"
                                        width="25" class="img-rounded ms-1 mt-1 me-1" alt="">
                                </div>

                                <div class="col-11">
                                    <h6 class="m-0 ms-1 mt-1">{{ $comment->user->name }}</h6>
                                    <p class="m-0 ms-1"><small>{{ $comment->konten }}</small></p>
                                    <small
                                        class="text-primary fst-italic fw-light text-decoration-none ms-1 m-0 me-1">{{ $comment->created_at->diffForHumans()}}</small>
                                    <div class="ms-1 d-flex flex-row align-items-center justify-content-start p-0">
                                        @if ($comment->user_id == Auth::user()->id)
                                        <form action="/user/delete/{{ $comment->id }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button class="btn p-0 btn-link text-decoration-none " type="submit"
                                                onclick="return confirm('Apakah anda yakin akan menghapus komentar ini?')">
                                                <small class="m-0 me-2">hapus komentar</small>

                                            </button>
                                        </form>
                                        @endif
                                        <a class="text-decoration-none" data-bs-toggle="collapse"
                                            href="#collapseExample" role="button" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            <small class="m-0">balas</small>
                                        </a>
                                    </div>

                                    <div class="collapse" id="collapseExample">

                                        @foreach ($replies as $reply)
                                        @if ($reply->parent_id == $comment->id)
                                        <div class="row">
                                            <div class="col-10">
                                                <p class="m-0 text-end">
                                                    <small class="fw-bold">
                                                        {{ $reply->user->name }}
                                                    </small>
                                                </p>
                                                <p class="m-0 text-end">
                                                    <small>
                                                        {{ $reply->konten }}
                                                    </small>
                                                </p>
                                                <p class="m-0 text-end">
                                                    <small
                                                        class="p-0 text-primary fst-italic fw-light text-decoration-none">{{ $reply->created_at->diffForHumans()}}</small>
                                                </p>
                                                <div
                                                    class="ms-1 d-flex flex-row align-items-center justify-content-end p-0">
                                                    @if ($reply->user_id == Auth::user()->id)
                                                    <form action="/user/delete/{{ $reply->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn p-0 btn-link text-decoration-none mb-2 "
                                                            type="submit"
                                                            onclick="return confirm('Apakah anda yakin akan menghapus balasan komentar ini?')">
                                                            <small class="m-0">hapus komentar</small>

                                                        </button>
                                                    </form>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-2 ps-2">
                                                <img src="{{ asset('storage/' .$reply->user->image) }}" height="20"
                                                    width="20" class="img-rounded" alt="">
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                        <form action="/komentar" method="post" class="">
                                            @csrf
                                            <input type="hidden" name="aspirasi_id" value="{{ $aspirasi->id }}" id="">
                                            <input type="hidden" name="parent_id" value="{{$comment->id }}" id="">
                                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}" id="">

                                            <div class="input-group input-group-sm m-0 mb-3">
                                                <span class="input-group-text bg-white border-end-0"
                                                    style="border-top-left-radius: 15px;border-bottom-left-radius: 15px;"
                                                    id="inputGroup-sizing-sm">
                                                    <img src="{{ asset('storage/' .Auth::user()->image) }}"
                                                        class="img-rounded" width="20" height="20">
                                                </span>
                                                <input type="text" name="konten"
                                                    class="form-control border-start-0 border-end-0"
                                                    aria-describedby="inputGroup-sizing-sm"
                                                    placeholder="balas komentar...">

                                                <button type="submit" class="input-group-text bg-white border-start-0"
                                                    style="border-top-right-radius: 15px;border-bottom-right-radius: 15px;"
                                                    id="inputGroup-sizing-sm"><i class="bi bi-send-plus"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
