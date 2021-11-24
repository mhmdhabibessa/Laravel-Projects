<?php

namespace App\Models;
use App\Models\Comment; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title','discription','link_photo','category_id','user_id'];


    public function comment()
    {
        return $this -> hasMany(Comment::class);
    }

    public function category()
    {
        return $this -> belongsTo(Category::class);
    }

    public function author() {
        return $this -> belongsTo(User::class,'user_id');
    }
}

