<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index_post() {
        $posts = Post::all();

        return view('dashboard.post.index', compact('posts'));
    }

    public function store_post(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $date = Carbon::now();
        $user_id = Auth::user()->id;

        Post::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'content' => $request->content,
            'date' => $date,
        ]);

        return Redirect::back();
    }

    public function detail_post(Post $post) {
        return view('dashboard.post.detail', compact('post'));
    }

    public function edit_post(Post $post) {
        return view('dashboard.post.edit', compact('post'));
    }

    public function update_post(Post $post, Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return Redirect::back();
    }

    public function delete_post(Post $post) {
        $post->delete();

        return Redirect::back();
    }
}
