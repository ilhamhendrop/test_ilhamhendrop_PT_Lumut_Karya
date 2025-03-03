@extends('master')

@section('title')
    Detail
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
                        <div class="card-text">
                            <p>Username: {{ $user->username }}</p>
                            <p>Nama: {{ $user->name }}</p>
                            <p>Role: {{ $user->role }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
