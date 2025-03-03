@extends('master')

@section('title')
    Post
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
                                    <th class="card-title">Judul</th>
                                    <th class="card-title">Konten</th>
                                    <th class="card-title">Penulis</th>
                                    <th class="card-title">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->content }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            <a href="{{ route('post.detail', ['post' => $post]) }}" class="btn btn-primary">Detail</a>
                                            <a href="{{ route('post.edit', ['post' => $post]) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('post.delete', ['post' => $post]) }}" method="post">
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
                <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <input type="text" name="title" class="form-control" placeholder="Judul"
                            id="">
                        @error('username')
                            <label for="">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Konten</label>
                        <textarea name="content" class="form-control" placeholder="Konten" id="" cols="20" rows="8"></textarea>
                        @error('content')
                            <label for="">{{ $message }}</label>
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
