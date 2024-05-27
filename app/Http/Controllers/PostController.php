<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Auth::user()->posts;

        return view('resources.post.index', ['posts' => $posts]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resources.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
       Post::create([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'post' => $request->post,
            'status' => (isNull($request->status) ? 0 : 1)
        ]);
        

        return redirect()->route('post.index')->with('message', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('resources.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('resources.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        // dd($request->all());
        $post->update([
            'subject' => $request->subject,
            'post' => $request->post,
            'status' => (isset($request->status) ? 1 : 0)
        ]);

        return redirect()->route('post.index')->with('message', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index')->with('message', 'Post deleted successfully.');
    }
}
