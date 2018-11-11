<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entity\Post\Post;
use App\Entity\Category\Category;
use App\Http\Requests\Post\PostRequest;
use App\UseCases\Post\PostService;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('name')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $post = $this->service->create($request);

        } catch (\Exception $e) {
            flash($e->getMessage())->error();
            return back();
        }

        flash(__('Successfully saved'))->success();
        return redirect()->route('post.show', [$post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            $this->service->edit($post->id, $request);
        } catch (\Exception $e) {

            flash($e->getMessage())->error();
            return back();
        }

        flash(__('Successfully saved'))->success();
        return redirect()->route('post.show', [$post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            $this->service->delete($post->id);
        } catch (\Exception $e) {

            flash($e->getMessage())->error();
            return back();
        }

        flash(__('Successfully deleted'))->success();

        return redirect()->route('post.index');
    }
}
