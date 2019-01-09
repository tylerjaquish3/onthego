<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Auth;

class PostController extends Controller
{
    public function show($id)
    {
    	$post = Post::with('comments')->find($id);

    	return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return $this->edit(0);
    }

    public function edit($id)
    {
    	$post = Post::find($id);
    	$categories = Category::orderBy('id', 'asc')->get();
    	foreach($categories as $category) {
    		$categoriesArray[$category->id] = $category->name;
    	}

    	return view('posts.edit', ['post' => $post, 'categories' => $categoriesArray]);
    }

    public function update(Request $request, int $id)
    {
    	// var_dump($request->input());die;

    	$createdBy = Auth::user()->id;

    	$post = Post::find($id);
    	$post->update([
    		'title' => $request->title,
    		'category_id' => $request->category_id,
    		'content_html' => $request->content_html,
    		'is_active' => $request->is_active,
    		'created_by' => $createdBy
    	]);

    	return json_encode(['error' => false, 'message' => 'Post was saved.']);
    }

    public function store(Request $request)
    {
    	// var_dump($request->input());die;

    	$createdBy = Auth::user()->id;

    	Post::create([
    		'title' => $request->title,
    		'category_id' => $request->category_id,
    		'content_html' => $request->content_html,
    		'is_active' => $request->is_active,
    		'created_by' => $createdBy
    	]);

        return json_encode(['error' => false, 'message' => 'Post was saved.']);
    }
}
