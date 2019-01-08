<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Photo;

class BlogController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('category')->where('is_active', 1)->orderBy('created_at', 'desc')->get();
        $recentPosts = Post::where('is_active', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        $photos = Photo::where('is_active', 1)->orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Post::selectRaw('categories.name, COUNT(categories.id) as categoryCount')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('is_active', 1)
            ->groupBy('category_id')
            ->get();

        return view('home.index', [
            'posts' => $posts, 
            'recentPosts' => $recentPosts, 
            'photos' => $photos, 
            'categories' => $categories
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(int $id)
    {
    	$post = Post::find($id);
        $recentPosts = Post::where('is_active', 1)->orderBy('created_at', 'desc')->limit(5)->get();
        $categories = Post::selectRaw('categories.name, COUNT(categories.id) as categoryCount')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('is_active', 1)
            ->groupBy('category_id')
            ->get();

        return view('posts.show', [
            'post' => $post,
            'recentPosts' => $recentPosts, 
            'categories' => $categories
        ]);
    }

    public function showContact()
    {
        return view('home.contact');
    }

    public function showPhotos()
    {
        $photos = Photo::where('is_active', 1)->get();

        return view('home.photos', ['photos' => $photos]);
    }
}
