<?php

namespace App\UseCases\Post;

use App\Entity\File\File;
use App\Entity\Post\Post;
use App\Entity\Category\Category;
use App\Http\Requests\Post\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostService
{
    public function create(PostRequest $request): Post
    {
        return DB::transaction(function () use ($request) {

            /** @var Post $post */
            $post = Post::make($request->only([
                'name',
                'content',
            ]));

            if (!empty($request['category_id'])) {
                $post->category()->associate($this->getCategory($request['category_id']));
            }

            $post->saveOrFail();

            if ($request->hasFile('file')) {

                $uploadedFile = $request->file('file');

                /** @var File $file */
                $file = File::make([
                    'path' => $uploadedFile->store('posts', 'public'),
                    'name' => $uploadedFile->getClientOriginalName(),
                ]);
                $file->saveOrFail();

                $post->files()->create([
                    'file_id' => $file->id,
                ]);
            }

            return $post;
        });
    }

    public function edit($id, PostRequest $request): void
    {
        $post = $this->getPost($id);

        if (!empty($request['category_id'])) {
            $post->category()->associate($this->getCategory($request['category_id']));
        }

        $post->update($request->only([
            'category_id',
            'name',
            'content',
        ]));

        if ($request->hasFile('file')) {

            foreach ($post->files as $oldFile) {
                Storage::delete('public/' . $oldFile->file->path);
                $oldFile->file->delete();
            }

            $uploadedFile = $request->file('file');

            /** @var File $file */
            $file = File::make([
                'path' => $uploadedFile->store('posts', 'public'),
                'name' => $uploadedFile->getClientOriginalName(),
            ]);
            $file->saveOrFail();

            $post->files()->create([
                'file_id' => $file->id,
            ]);
        }
    }

    public function delete($id): void
    {
        $post = $this->getPost($id);

        foreach ($post->files as $oldFile) {
            Storage::delete('public/' . $oldFile->file->path);
            $oldFile->file->delete();
        }

        foreach ($post->comments as $oldComment) {
            $oldComment->comment->delete();
        }

        $post->delete();
    }

    private function getPost($id): Post
    {
        return Post::findOrFail($id);
    }

    private function getCategory($id): Category
    {
        return Category::findOrFail($id);
    }
}
