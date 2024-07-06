<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//１

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;//２
    //１と２によって、deleted_atというカラムに値が設定される。
    //以降は削除扱いになり、検索等で検索できなくなっている
    
    
    
    protected $fillable=[
        'title',
        'body',
        'category_id',
        //外部キーなので、関連するcategoryの情報を入れて保存する必要がある
    ];
    
    public function getPaginateByLimit(int $limit_count=5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        
        //モデル::with(リレーション名)->paginate()に関して
        //リレーションによってDBアクセスの回数を減らすための機能
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}


