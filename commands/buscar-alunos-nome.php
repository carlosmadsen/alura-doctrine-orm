<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);


//vem um array 
$luiz1 = $alunoRepository->findBy([
	'nome' => 'Luiz Alberto' 
]);
var_dump($luiz1);


$luiz = $alunoRepository->findOneBy([
	'nome' => 'Luiz Alberto' 
]);
var_dump($luiz);
