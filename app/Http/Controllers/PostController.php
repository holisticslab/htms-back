<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return response()->json([
            'message' => 'lala',
            'data' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'name' => $request->name,
            'body' => $request->body,
        ]);
        return response()->json([
            'data' => $post
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $id)
    {
        $post = Post::find($id);
        return response()->json([
            'data' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->update([
            'name' => $request->name,
            'body' => $request->body,
        ]);
        // $post = Post::find($id);
        // $post->update([
        //     'name' => $request->name,
        //     'body' => $request->body,
        // ]);
        // $post = Post::find($id);
        // $post->name = $request->name;
        // $post->body = $request->body;
        // $post->save();
        return response()->json([
            'data' => $post
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        // $deleted = Post::destroy($id);
    }

    public function getPaginatedPosts(Request $request) {
        $posts = Post::paginate($request->limit ?? 10);

        return response()->json([
            'data' => $posts
        ]);
    }
}
