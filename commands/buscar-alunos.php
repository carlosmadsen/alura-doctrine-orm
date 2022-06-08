<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$dados = $alunoRepository->findBy(
	[], //nenhum where 
	[
		'nome' => 'asc',
		'id' => 'desc'
	],
	50, //limit
	0 //offset
);
var_dump($dados);
