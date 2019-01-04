<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    // public function show($id)
    // {
    // 	$post = Post::with('comments')->find($id);

    // 	return view('posts.show', ['post' => $post]);
    // }

    // public function create()
    // {
    //     return $this->edit(0);
    // }

    // public function edit($id)
    // {
    // 	$post = Post::find($id);

    // 	return view('posts.edit', ['post' => $post]);
    // }

    // public function update(Request $request, int $id)
    // {
    // 	// var_dump($request->input());die;

    // 	$createdBy = Auth::user()->id;

    // 	$post = Post::find($id);
    // 	$post->update([
    // 		'title' => $request->title,
    // 		'content_html' => $request->content_html,
    // 		'is_active' => $request->is_active,
    // 		'created_by' => $createdBy
    // 	]);

    // 	return json_encode(['error' => false, 'message' => 'Post was saved.']);
    // }

    public function store(Request $request)
    {
    	Comment::create([
            'post_id' => $request->post_id,
    		'comment_text' => $request->comment_text,
    		'user_name' => $request->user_name
    	]);

        return json_encode(['error' => false, 'message' => 'Comment was saved.']);
    }
}
