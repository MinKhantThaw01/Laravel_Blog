<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    // protected $fillable = ['title','intro','body'];
    protected $with = ['category','author'];

    public function scopeFilter($query, $filter)
    {
        $query->when($filter['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'LIKE', '%'.$search.'%')
                                 ->orwhere('body', 'LIKE', '%'.$search.'%');
            });
        });
        $query->when($filter['category'] ?? false, function ($query, $slug) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        });

        $query->when($filter['user'] ?? false, function ($query, $user_name) {
            $query->whereHas('author', function ($query) use ($user_name) {
                $query->where('user_name', $user_name);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subscriber()
    {
        return $this->belongsToMany(User::class, 'blog_user');
    }

    public function unSubscribe()
    {
        return $this->subscriber()->detach(auth()->id());
    }
    public function subscribe()
    {
        return $this->subscriber()->attach(auth()->id());
    }
}
