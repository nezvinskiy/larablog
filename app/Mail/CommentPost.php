<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entity\Post\Post;
use App\Entity\Comment\Comment;

class CommentPost extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The comment instance.
     *
     * @var Comment
     */
    protected $comment;

    /**
     * The post instance.
     *
     * @var Post
     */
    protected $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Comment $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New comment by ' . $this->comment->author)
            ->markdown('emails.posts.comment')
            ->with([
                'comment' => $this->comment,
                'post' => $this->post,
            ]);
    }
}
