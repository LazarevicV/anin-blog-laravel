<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $blogs = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('homepage', ['title' => 'Homepage', 'blogs' => $blogs]);
    }
}
