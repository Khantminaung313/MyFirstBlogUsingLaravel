<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {

        return view('blogs.index', [
            
            'blogs' => Blog::latest()
            ->filter(request(['search', 'category', 'author']))
            ->paginate(6)
            ->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => Blog::inrandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        if(User::find(auth()->id())->isSubscribed($blog))
        {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }

        return back();
    }
}
