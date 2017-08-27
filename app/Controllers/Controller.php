<?php

namespace Blog\Controllers;

use Slim\Router;
use Slim\Views\Twig as View;
use Blog\Models\Post;
use Blog\Models\Comment;

class Controller
{

  protected $router;

  protected $view;

  protected $post;

  protected $comment;

  public function __construct(Router $router, View $view, Post $post, Comment $comment)
  {
    $this->router = $router;
    $this->view = $view;
    $this->post = $post;
    $this->comment = $comment;
  }
}