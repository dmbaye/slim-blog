<?php

namespace Blog\Models;

use Blog\Models\Model;

class Comment extends Model
{

  protected $fillable = ['post_id', 'author', 'body'];

  public function post()
  {
    return $this->belongsTo('Blog\Models\Post');
  }
}