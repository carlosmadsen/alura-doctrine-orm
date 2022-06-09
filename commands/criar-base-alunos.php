<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$nomes = [
	'Carlos Alberto',
	'Carlos Roberto',
	'Carlos Eduardo',
	'Fábio Pereira',
	'Maria da Silva',
	'José da Silva',
	'Denise Silveira',
	'Thais Cruz',
	'Adroaldo Silveira',
	'Érica Barros'
];

try {
	$entityManagerFactory  = new EntityManagerFactory();
	$entityManager  = $entityManagerFactory->getEntityManager();
	foreach ($nomes as $nome) {
		$aluno = new Aluno();
		$aluno->setNome($nome);
		$entityManager->persist($aluno); 
		$entityManager->flush(); 
	}	
}
catch (Exception $e) {
	echo $e->getMessage()."\n";
}