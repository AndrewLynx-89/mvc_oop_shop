<?php

use engine\Router\Router;

    Router::add('catalog/(?P<alias>[a-z0-9-]+)', ['controller' => 'Catalog', 'action' => 'index']);
    Router::add('catalog/?(?P<action>[a-z-]+)?/(?P<id>[0-9]+)', ['controller' => 'Catalog', 'action' => 'view']);

    Router::add('admin', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
    Router::add('admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?', ['prefix' => 'admin']);

    Router::add('', ['controller' => 'Main', 'action' => 'index']);
    Router::add('(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?');