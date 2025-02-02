<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Requests\PostRequest;

use App\Models\Post;
use App\Models\User;


class PostsController extends Controller
{
    public function __construct(private Post $post)
    {}

    public function index()
    {
        $posts = $this->post->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create(User $user)
    {
        $users = $user->all(['id' => 'name']); // select id, name from users
        return view('admin.posts.create', compact('users'));
    }

    public function store(PostRequest $request, User $user)
    {
        /* Active Record Way
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->body = $request->body;
        $post->is_active = $request->is_active;
        $post->slug = Str::slug($request->title);

        $post->save();*/

        // Mass Assignment Way
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $data['thumb'] = $request->thumb?->store('posts', 'public');
        // $user['user_id'] = $request->user;

        //$user = auth()->user(); // model user populado com os dados do user autenticado
        $user = $user->find($request->user);
        $user->posts()->create($data);

        return redirect()->route('admin.posts.index');
    }

    public function edit($post)
    {
        $post = $this->post->findOrFail($post);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($post, PostRequest $request)
    {
        $post = $this->post->findOrFail($post);

        // se tiver imagem na request
        // removo a thumb atual 
        // e faço novo upload
        $data = $request->all();
        if($request->thumb){
            if($post->thum) Storage::disk('public')->delete($post->thumb);//remover a thumb atual
            
            $data['thumb'] = $request->thumb?->store('posts', 'public');
        }


        $post->update($data);

        return redirect()->route('admin.posts.edit', $post->id);
    }

    public function destroy($post)
    {
        $post = $this->post->findOrFail($post);
        $post->delete();

        return redirect()->back();
    }
}
