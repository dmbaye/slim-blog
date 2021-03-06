<?php

namespace Blog;

use DI\ContainerBuilder;
use DI\Bridge\Slim\App as DiBridge;

class App extends DIBridge
{

  protected function configureContainer(ContainerBuilder $builder)
  {
    $builder->addDefinitions([
      'settings.displayErrorDetails' => true
    ]);

    $builder->addDefinitions(__DIR__ . '/../config/container.php');
  }
}