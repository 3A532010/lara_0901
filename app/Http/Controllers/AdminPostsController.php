<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.index', $data);
        //return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function edit($id)
    {
        //$data = ['id' => $id];
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

public function store()
{

}

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('admin.posts.index');
    }


}
