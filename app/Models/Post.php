<?php

namespace Blog\Models;

use Blog\Models\Model;

class Post extends Model
{

  protected $fillable = ['title', 'body'];

  public function comments()
  {
    return $this->hasMany('Blog\Models\Comment');
  }
}