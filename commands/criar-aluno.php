<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

try {
	$entityManagerFactory  = new EntityManagerFactory();
	$entityManager  = $entityManagerFactory->getEntityManager();

	$nome = $argv[1];
	if (empty($nome)) {
		throw new Exception("Nome do aluno não informado.", 1);
	}
	$aluno = new Aluno();
	$aluno->setNome($nome);

	for ($i = 2; $i < $argc; $i++) {
		$numeroTelefone = $argv[$i];
		$telefone = new Telefone();
		$telefone->setNumero($numeroTelefone);
		$aluno->addTelefone($telefone);
	}

	$entityManager->persist($aluno); //começa a observar o objeto 
	$entityManager->flush(); //realmente faz o insert ou update no banco 
}
catch (Exception $e) {
	echo $e->getMessage()."\n";
}