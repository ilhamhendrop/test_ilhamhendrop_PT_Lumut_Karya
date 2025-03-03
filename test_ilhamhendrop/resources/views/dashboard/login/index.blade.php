@extends('master_login')

@section('title')
    Login
@endsection

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <form action="{{ route('login.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="username" id="">
                                @error('username')
                                    <label for="">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" id="">
                                @error('password')
                                    <label for="">{{ $message }}</label>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
