<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);
/** @var Aluno[] $alunoList */
$alunoList = $alunoRepository->findAll();
foreach ($alunoList as $aluno) {
	echo $aluno->getId()." - ".$aluno->getNome()."\n";
}
