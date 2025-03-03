@extends('master')

@section('title')
    Edit
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
                        <form action="{{ route('post.update', ['post' => $post]) }}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name="title" class="form-control" value="{{ $post->title }}"
                                    id="">
                                @error('username')
                                    <label for="">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="">Konten</label>
                                <textarea name="content" class="form-control" placeholder="Konten" id="" cols="20" rows="8">{{ $post->content }}</textarea>
                                @error('content')
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
