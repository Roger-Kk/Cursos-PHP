<?php

use DI\ContainerBuilder;

$buider = new ContainerBuilder();
$builder->addDefinitions([
    
]);

/** @var \Psr\Container\ContainerInterface $container */
$container = $builder->build();

return $container;