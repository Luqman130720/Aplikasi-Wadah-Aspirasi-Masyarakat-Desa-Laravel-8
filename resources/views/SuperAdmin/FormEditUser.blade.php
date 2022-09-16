@extends('layout.DashboardSuperAdmin')
@section('container')

<div class="form-box" style="max-width: 500px; margin:auto; padding:50px; border:10px solid #E38B29; background:#fff">

    <form action="/superadmin/formedituser/{{ $user->id }}/update" enctype="multipart/form-data" method="post">
        @method('put')
        @csrf
        <div class="form-group d-flex justify-content-center mb-4">
            @if ($user->image)
            <img src="{{ asset('storage/' .$user->image) }}" class="img-preview " width="270" height="150">
            @else
            <img class="img-preview" width="270" height="150">
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input style="width: 100%" class="form-control" id="name" type="text" name="name"
                value={{ old('name',$user->name) }}>
        </div>
        <div class="form-group mb-3">
            <label for="username">Username</label>
            <input style="width: 100%" class="form-control" id="username" type="text" name="username"
                value={{ old('username',$user->username) }}>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input style="width: 100%" class="form-control" id="email" type="text" name="email"
                value={{ old('email',$user->email) }}>
        </div>
        <div class="form-group mb-3 d-none">
            <label for="password">Password</label>
            <input style="width: 100%" class="form-control" id="password" type="text" name="password"
                value={{ old('password',$user->password) }}>
        </div>
        <div class="form-group mb-3">
            <label for="Image">Image</label>
                <input class="form-control form-input" @error('image') is-invalid @enderror type="file" id="image"
                    name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
        </div>

        <div class="form-group mb-3">
            <label for="role">Role</label>
            <select name="role" class="form-select" aria-label="Default select example">
                @if ($user->role === 3)
                <option selected value="{{ $user->id }}">User</option>
                @endif
                <option value="2">Admin</option>
            </select>
        </div>
        <input style="width: 100%; background: #E38B29; border:#E38B29" class="btn btn-primary" type="submit"
            value="Submit" />
    </form>
</div>
@endsection
