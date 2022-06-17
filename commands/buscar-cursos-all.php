<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Curso::class);
$cursoList = $alunoRepository->findAll();
foreach ($cursoList as $curso) {
	echo "Id: ".$curso->getId()."\nNome: ".$curso->getNome();
	echo "\n\n";
}
