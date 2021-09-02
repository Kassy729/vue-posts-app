<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {

        // dd($request);

        $title = $request->title;
        $content = $request->content;
        return $title;
        // $request->validate([  //빈칸일 경우 제출되지 않도록 막아줌
        //     'title' => 'required|min:3',  //최소 3글자 이상
        //     'content' => 'required',
        //     'imageFile' => 'image|max:2000'
        // ]);

        //DB에 저장
        $post = new Post();
        return $post;
        $post->title = $title;
        $post->content = $content;
        $post->user_id = 1;

        $post->save();
        return $post;
    }
}
