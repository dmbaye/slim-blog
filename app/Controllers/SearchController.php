<?php

namespace Blog\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SearchController extends Controller
{

  public function find(Request $request, Response $response)
  {
    // Validate user inputs
    
    $results = $this->post->where('title', 'LIKE', "%{$request->getParam('search')}%")
                          ->orWhere('body', 'LIKE', "%{$request->getParam('search')}%")
                          ->get();

    if (!$results) {
      return $response->withRedirect($this->router->pathFor('root'));
    }

    return $this->view->render($response, 'search/search.html.twig', [
      'results' => $results,
    ]);
  }
}