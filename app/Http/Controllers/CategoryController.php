<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('blogs.index', [
            'blogs' => $category->blogs()->paginate(3),
            'currentCategory' => $category
        ]);
    }
}
