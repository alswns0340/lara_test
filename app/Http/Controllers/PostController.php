<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index(){
        //
        $posts=Post::orderby('created_at','desc')->paginate(10);
        return view('posts.index',compact('posts'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string',
        
    ]);

    $validated['user_id'] = auth()->id(); // 🔥 로그인 유저 자동 입력

    Post::create($validated);

    return redirect()->route('posts.index')
        ->with('success', '게시글이 등록되었습니다.');
}

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }   

    public function create(){
        return view('posts.create');
    }

    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post){
        $validated = $request -> validate([
            'title'=>'required|max:255',
            'content'=>'required',
        ]);

        $post -> update($validated);

        return redirect()->route('posts.show',$post)->with('success','Post updated successfully.');
    }

    public function destroy(Post $post){
        
        $post -> delete();

        return redirect()->route('posts.index')->with('success','Post deleted successfully.');  
    }
}
