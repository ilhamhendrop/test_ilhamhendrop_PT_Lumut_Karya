@extends('master')

@section('title')
    User
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="card-title">Username</th>
                                        <th class="card-title">Name</th>
                                        <th class="card-title">Role</th>
                                        <th class="card-title">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <a href="{{ route('user.detail', ['user' => $user]) }}" class="btn btn-primary">Detail</a>
                                                <a href="{{ route('user.edit.data', ['user' => $user]) }}"
                                                    class="btn btn-primary">Edit Data</a>
                                                <a href="{{ route('user.edit.password', ['user' => $user]) }}"
                                                    class="btn btn-primary">Edit Password</a>
                                                <form action="{{ route('user.delete', ['user' => $user]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username"
                                id="">
                            @error('username')
                                <label for="">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Nama</label>
                            <input type="text" name="name" placeholder="Nama" class="form-control" id="">
                            @error('name')
                                <label for="">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="">Role</label>
                            <select name="role" class="form-control" id="">
                                <option selected>pilih</option>
                                <option value="admin">Admin</option>
                                <option value="author">Author</option>
                            </select>
                            @error('role')
                                <label for="">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            @error('password')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label>Password Konfirmasi</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Password Konfirmasi">
                            @error('password_confirmation')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
