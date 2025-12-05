<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        PostComment::create([
            'post_id' => $post->id,
            'user_id' => auth()->id(),
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', '댓글이 등록되었습니다.');
    }

    public function update(Request $request, PostComment $comment)
    {
        // 작성자 체크
        if ($comment->user_id !== auth()->id()) {
            abort(403, '본인 댓글만 수정할 수 있습니다.');
        }

        $validated = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update([
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('posts.show', $comment->post)
            ->with('success', '댓글이 수정되었습니다.');
    }

    public function destroy(PostComment $comment)
    {
        // 작성자 체크
        if ($comment->user_id !== auth()->id()) {
            abort(403, '본인 댓글만 삭제할 수 있습니다.');
        }

        $post = $comment->post;

        $comment->delete();

        return redirect()
            ->route('posts.show', $post)
            ->with('success', '댓글이 삭제되었습니다.');
    }
}
