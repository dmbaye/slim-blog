<?php

namespace Blog\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CommentController extends Controller
{

  public function create(Request $request, Response $response, $id)
  {
    // Validate user inputs
    
    $comment = $this->comment->create([
      'post_id' => $id,
      'author' =>  $request->getParam('author'),
      'body' =>    $request->getParam('body'),
    ]);

    if (!$comment) {
      return $response->withRedirect($this->router->pathFor('posts.show', [ id => $id ]));
    }

    return $response->withRedirect($this->router->pathFor('posts.show', [ id => $id ]));
  }
}