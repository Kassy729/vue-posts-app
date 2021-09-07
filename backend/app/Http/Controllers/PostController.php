<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $title = $request->title;
        $content = $request->content;

        $post = new Post();

        $post->title = $title;
        $post->content = $content;

        // $post->user_id = Auth::user()->id;

        // return Auth::user()->id;

        $post->user_id = 1;


        // return $request;
        $post->save();
    }

    public function index()
    {
        $posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::latest()->paginate(4);
        // $posts = Post::latest()->paginate(4);
        return $posts;
    }

    public function show($id)
    {
        $post = Post::find($id);
        return $post;
    }
}
