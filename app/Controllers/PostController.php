<?php

namespace Blog\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PostController extends Controller
{

  public function index(Request $request, Response $response)
  {
    $posts = $this->post->orderBy('created_at', 'DESC')->get();

    return $this->view->render($response, 'post/index.html.twig', [
      'posts' => $posts,
    ]);
  }

  public function new(Request $request, Response $response)
  {
    return $this->view->render($response, 'post/new.html.twig');
  }

  public function create(Request $request, Response $response)
  {
    // Validate user inputs
    
    $post = $this->post->create($request->getParams());

    if (!$post) {
      return $response->withRedirect($this->router->pathFor('posts.new'));
    }

    return $response->withRedirect($this->router->pathFor('posts.show', ['id' => $post->id]));
  }

  public function show(Request $request, Response $response, $id)
  {
    $post = $this->post->find($id);
    $comments = $this->post->find($id)->comments;

    if (!$post) {
      return $response->withRedirect($this->router->pathFor('root'));
    }

    return $this->view->render($response, 'post/show.html.twig', [
      'post' => $post,
      'comments' => $comments,
    ]);
  }

  public function edit(Request $request, Response $response, $id)
  {
    $post = $this->post->find($id);

    if (!$post) {
      return $response->withRedirect($this->router->pathFor('root'));
    }

    return $this->view->render($response, 'post/edit.html.twig', [
      'post' => $post,
    ]);
  }

  public function update(Request $request, Response $response, $id)
  {
    // Validate user data
    
    $post = $this->post->where('id', $id)
                       ->update([
                          'title' => $request->getParam('title'),
                          'body' => $request->getParam('body'),
                        ]);

    if (!$post) {
      return $response->withRedirect($this->router->pathFor('root'));
    }

    return $response->withRedirect($this->router->pathFor('posts.show', ['id' => $id]));
  }

  public function delete(Request $request, Response $response, $id)
  {
    $this->comment->where('post_id', $id)->delete();
    $post = $this->post->where('id', $id)->delete();

    return $response->withRedirect($this->router->pathFor('root'));
  }
}