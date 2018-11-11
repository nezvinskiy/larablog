<?php

namespace App\Http\Controllers;

use App\Entity\Category\Category;
use App\Entity\Post\Post;
use App\UseCases\Comment\CommentService;
use App\Http\Requests\Comment\CommentRequest;

class CommentController extends Controller
{
    protected $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function post(CommentRequest $request, Post $post)
    {
        try {
            $comment = $this->service->addForPost($request, $post);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return [
            'data' => $comment,
        ];
    }

    public function category(CommentRequest $request, Category $category)
    {
        try {
            $comment = $this->service->addForCategory($request, $category);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return [
            'data' => $comment,
        ];
    }
}
