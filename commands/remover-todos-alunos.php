<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);
$alunoList = $alunoRepository->findAll();
foreach ($alunoList as $aluno) {
	$entityManager->remove($aluno);
}
$entityManager->flush(); 
