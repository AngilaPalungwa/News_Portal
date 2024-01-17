<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // latest news
        $posts = Post::orderBy('id', 'desc')->limit(2)->get();

        // Policits
        $category = Category::where('slug', 'politics')->first();
        $politics = $category->posts;
        return view('frontend.pages.home',compact('posts','politics'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts;
        return view('frontend.pages.category', compact( 'posts'));
    }
    public function single($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('frontend.pages.single', compact('post'));

    }
}
