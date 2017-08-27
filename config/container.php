<?php

use Interop\Container\ContainerInterface;
use function DI\get;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Blog\Models\Post;
use Blog\Models\Comment;

return [
  Twig::class => function (ContainerInterface $c) {
    $twig = new Twig(__DIR__ . '/../resources/views', [
      'cache' => false
    ]);

    $twig->addExtension(new TwigExtension(
      $c->get('router'),
      $c->get('request')->getUri()
    ));

    return $twig;
  },
  Post::class => function (ContainerInterface $c) {
    return new Post;
  },
  Comment::class => function (ContainerInterface $c) {
    return new Comment;
  },
];