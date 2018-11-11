<?php

namespace App\UseCases\Comment;

use App\Entity\Category\Category;
use App\Entity\Post\Post;
use App\Entity\Comment\Comment;
use App\Entity\Post\Comment as PostComment;
use App\Entity\Category\Comment as CategoryComment;
use App\Http\Requests\Comment\CommentRequest;
use Illuminate\Support\Facades\DB;

class CommentService
{
    public function addForPost(CommentRequest $request, Post $post): Comment
    {
        return DB::transaction(function () use ($request, $post) {

            /** @var Comment $comment */
            $comment = Comment::make($request->only([
                'author',
                'content',
            ]));
            $comment->saveOrFail();

            $comment->posts()->create([
                'post_id' => $post->id,
            ]);

            return $comment;
        });
    }

    public function addForCategory(CommentRequest $request, Category $category): Comment
    {
        return DB::transaction(function () use ($request, $category) {

            /** @var Comment $comment */
            $comment = Comment::make($request->only([
                'author',
                'content',
            ]));
            $comment->saveOrFail();

            $comment->categories()->create([
                'category_id' => $category->id,
            ]);

            return $comment;
        });
    }
}
