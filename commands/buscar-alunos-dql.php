<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

echo "\nCOM REPOSITÓRIO: \n";

//com respositório 
$alunoRepository = $entityManager->getRepository(Aluno::class);
$alunoList = $alunoRepository->findAll();
foreach ($alunoList as $aluno) {
	echo "Id: ".$aluno->getId()." Nome: ".$aluno->getNome()."\n";
}

echo "\nCOM DQL: \n";

//com DQL (doctriny query language)
$dql = 'SELECT aluno FROM Alura\Doctrine\Entity\Aluno aluno';
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();
foreach ($alunoList as $aluno) {
	echo "Id: ".$aluno->getId()." Nome: ".$aluno->getNome()."\n";
}

echo "\nCOM DQL id 1: \n";
$dql = "SELECT aluno FROM Alura\Doctrine\Entity\Aluno aluno WHERE aluno.id = 1  ";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();
foreach ($alunoList as $aluno) {
	echo "Id: ".$aluno->getId()." Nome: ".$aluno->getNome()."\n";
}

echo "\nCOM DQL todos os carlos: \n";
$dql = "SELECT 
	aluno 
FROM Alura\Doctrine\Entity\Aluno aluno 
WHERE 
	aluno.nome like 'carlos%'  
ORDER BY 
	aluno.nome ";
$query = $entityManager->createQuery($dql);
$alunoList = $query->getResult();
foreach ($alunoList as $aluno) {
	echo "Id: ".$aluno->getId()." Nome: ".$aluno->getNome()."\n";
}


