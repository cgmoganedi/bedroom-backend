<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }
    public function store(){
        $post = request()->validate([
            'caption' => 'required|string|max:200',
            'image' => 'required|image'
        ]);

        $imagePath = $post['image']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $post['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }
    public function show(\App\Post $post){
        //dd($post->image);
        return view('posts.show', [
            'post'=> $post
        ]);
    }
}
