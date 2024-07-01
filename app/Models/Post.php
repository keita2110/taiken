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
    ];
    
    public function getPaginateByLimit(int $limit_count=10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
}


