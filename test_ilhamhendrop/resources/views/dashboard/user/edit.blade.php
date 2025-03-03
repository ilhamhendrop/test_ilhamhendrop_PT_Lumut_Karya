@extends('master')

@section('title')
    Edit Data
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-header">
                        <a href="{{ route('user.index') }}">back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update.data', ['user' => $user]) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ $user->username }}"
                                    id="">
                                @error('username')
                                    <label for="">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Nama</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="">
                                @error('name')
                                    <label for="">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Role</label>
                                <select name="role" class="form-control" id="">
                                    <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                                    <option value="admin">Admin</option>
                                    <option value="author">Author</option>
                                </select>
                                @error('role')
                                    <label for="">{{ $message }}</label>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
