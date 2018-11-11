<?php

namespace App\Entity\Post;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files_posts';

    protected $fillable = ['file_id', 'post_id'];

    public $timestamps = false;

    public function file()
    {
        return $this->belongsTo(\App\Entity\File\File::class, 'file_id', 'id');
    }
}
