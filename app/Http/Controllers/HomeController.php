<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private Post $post)
    {}

    public function index()
    {
        $posts = $this->post->where('is_active', true)->latest()->paginate(10);

        return view('post.index', compact('posts'));
    }

    public function show($post){
        $post = $this->post->where('slug', $post)->firstOrFail();

        return view('post.posts', ['post' =>$post]);
    }
}
