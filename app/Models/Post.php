<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['category_id','author_id','title','title_ar','slug','cover','body','body_ar','keyword','meta_desc','views','status'];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'author_id');
    }

    // public function admin()
    // {
    //     return $this->belongsTo(Admin::class,'author_id');
    // }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
