@extends('master')

@section('title')
    Edit Password
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
                        <form action="{{ route('user.update.password', ['user' => $user]) }}" method="post">
                            @csrf
                            @method('patch')
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
                            <button class="btn btn-primary mt-2" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
