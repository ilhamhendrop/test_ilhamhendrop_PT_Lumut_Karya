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
                        <a href="{{ route('post.index') }}">back</a>
                    </div>
                    <div class="card-body">
                        <h6>{{ $post->title }}</h6>
                        <label for="">{{ $post->date }}</label>
                        <p>{{ $post->content }}</p>
                        <label for="">author: {{ $post->user->name }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
