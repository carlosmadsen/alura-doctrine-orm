<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;
use Alura\Doctrine\Helper\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

ConsoleRunner::run(
	new SingleManagerProvider($entityManager)
);
