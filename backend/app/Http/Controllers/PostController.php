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

        $post->user_id = Auth::user()->id;

        // $post->user_id = 1;

        // return $request;
        $post->save();
    }
}
