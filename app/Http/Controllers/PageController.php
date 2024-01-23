<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // latest news at the top
        $posts = Post::orderBy('id', 'desc')->limit(2)->get();

        //Latest  updates
        $latest = Post::orderBy('id', 'desc')->limit(5)->get();

        // Policits
        $category = Category::where('slug', 'politics')->first();
        $politics = $category->posts;

        // Entertainment
        $category = Category::where('slug', 'entertainment')->first();
        $entertainment = $category->posts;

        // International
        $category = Category::where('slug', 'international')->first();
        $international = $category->posts;

        // Ideas/Literature
        $category = Category::where('slug', 'literature')->first();
        $literature = $category->posts;

        // Heath/Education
        $category = Category::where('slug', 'health-science')->first();
        $healthEdu = $category->posts;
        
        // Business
        $category = Category::where('slug', 'business')->first();
        $business = $category->posts;
        return view('frontend.pages.home', compact('posts', 'politics', 'latest','literature','entertainment','international','healthEdu','business'));
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts;
        return view('frontend.pages.category', compact('posts'));
    }
    public function single($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->increment('views');
        //Latest Top 3 Post
        $latest = Post::orderBy('id', 'desc')->limit(5  )->get();
        return view('frontend.pages.single', compact('post', 'latest'));
    }
}
