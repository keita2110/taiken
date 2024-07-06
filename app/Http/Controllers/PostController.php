<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //requetをすでにuseしている
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

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
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories'=>$category->get()]);
        
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
        $categories=category::all();
        //カテゴリー情報を取得
        
        $post->load('category');
        //$postをロードする際に、関連するカテゴリー情報も同時にロードする
        
        return view('posts.edit')->with([
            'post'=>$post,
            'categories'=>$categories,
        ]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post=$request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/'.$post->id);
    }
    
    public function delete(Post $post){
        $post->delete();
        //これは物理削除　今回は論理削除なのでモデルクラスを修正する。
        
        return redirect('/');
    }
}
