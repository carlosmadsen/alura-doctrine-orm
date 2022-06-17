<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

try {
	$entityManagerFactory  = new EntityManagerFactory();
	$entityManager  = $entityManagerFactory->getEntityManager();

	$nome = $argv[1];
	if (empty($nome)) {
		throw new Exception("Nome do curso não informado.", 1);
	}
	$curso = new Curso();
	$curso->setNome($nome);

	$entityManager->persist($curso); 
	$entityManager->flush(); 
}
catch (Exception $e) {
	echo $e->getMessage()."\n";
}