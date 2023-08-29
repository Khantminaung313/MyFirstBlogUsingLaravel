<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guard = ['id'];
    // protected $with = ['category', 'author'];

    public function scopeFilter($query, $filter)
    {
        $query = $query->when($filter['search'] ?? false, function($query, $search) {
            $query->where(function($query) use($search) {
                $query->where('intro', 'LIKE' ,'%'. $search.'%')
                ->orWhere('title', 'LIKE', '%'. $search. '%')
                ->orWhere('body', 'LIKE', '%'. $search . '%');
                
            });
        });

        $query = $query->when($filter['category']??false, function($query, $slug) {
            $query->whereHas('category', function($query) use($slug) {
                $query->where('slug', $slug);
            });
        });

        $query = $query->when($filter['author']??false, function($query, $username) {
            $query->whereHas('author', function($query) use($username) {
                $query->where('username', $username);
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

    public function subscribers()
    {
        return $this->belongsToMany(User::class);
    }

    public function subscribe()
    {
        $this->subscribers()->attach(auth()->id());
    }

    public function unSubscribe()
    {
        $this->subscribers()->detach(auth()->id());
    }
    
}
