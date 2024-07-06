<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function posts()   
    {
        return $this->hasMany(Post::class);  
        //categoryモデルとPostモデルの間にはhasmanyのリレーションが定義されている
    }
    
    public function getByCategory(int $limit_count=5)
    {
        return $this->posts()->with('category')->orderBy('updated_at','DESC')->paginate($limit_count);
        //$this->posts()：カテゴリーに関連付けられたすべての投稿(Postモデルのインスタンス群)を
        //取得するためのクエリビルダを返す。
        
        //<with（一括読み込み）に関して>
        //posts()メソッドによって取得されるPostモデルのクエリビルダに対して
        //with('category')を使用することで、各投稿に関連付けられたCategoryモデルのデータを取得する
    }
}
