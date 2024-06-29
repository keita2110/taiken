<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //requetをすでにuseしている
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post'=>$post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Post $post,PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input=$request['post'];
        //createのname=post[～]から[]内が決まる
        $post->fill($input)->save();
        //insertが勝手に行なわれる
        return redirect('/posts/'.$post->id);
        //入力後にページの遷移のために使用する
        //postインスタンスからidを取得してページに遷移するようにする
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post'=>$post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post=$request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/'.$post->id);
    }
}
