@extends('layout.DashboardSuperAdmin')
@section('container')
<div class="overflow-auto">
    @if (session()->has('DeleteUser'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hapus Data Berhasil!</strong> {{session('DeleteUser')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th class="text-center" scope="col">foto profil</th>
                <th scope="col">nama</th>
                <th scope="col">username</th>
                <th scope="col">email</th>
                <th scope="col">role</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <div class="row">
                @foreach($user as $users)
                @if ($users->role != 1)
                <tr>
                    <td class="text-center"><img src="{{ asset('storage/' .$users->image) }}" height="30" width="30"
                            class="img-rounded" alt=""></td>
                    <td>{{$users->name}}</td>
                    <td>{{$users->username}}</td>
                    <td>{{$users->email}}</td>
                    <td>
                         @if ($users->role == 1 )
                         Super Admin
                         @endif
                        @if ($users->role == 2 )
                         Admin
                         @endif
                        @if ($users->role == 3 )
                         User
                         @endif
                    </td>
                    <td>
                        <a style="" href="/superadmin/formedituser/{{ $users->id }}/edit">
                            <button class="btn btn-sm btn-success mt-1" type="button">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="/delete/user/{{ $users->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn border-3 btn-sm rounded btn-outline-success" type="submit"
                                onclick="return confirm('Apakah kamu yakin akan menghapus user ini?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </div>
            @endif
            @endforeach
</div>
</tbody>
</table>
</div>
@endsection
