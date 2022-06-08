<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$aluno = $entityManager->find(Aluno::class, $id); //select carregando todos os dados de aluno 

if (empty($aluno)) {
	echo "Aluno inexistente.\n";
}
else {
	echo "Nome do aluno removido: ".$aluno->getNome()."\n";
	$entityManager->remove($aluno);
	$entityManager->flush(); 
}
