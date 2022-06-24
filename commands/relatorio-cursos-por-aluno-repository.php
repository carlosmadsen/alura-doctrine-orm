<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Alura\Doctrine\Repository\AlunoRepository; 

use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$alunoList = $alunoRepository->buscaCursosPorAluno();

foreach ($alunoList as $aluno) {
	$telefones = $aluno
    	->getTelefones()
    	->map(function (Telefone $telefone){
        	return $telefone->getNumero();
    	})
    	->toArray();
	echo "Id: ".$aluno->getId()."\nNome: ".$aluno->getNome();
	if (!empty($telefones)) {
		echo "\nTelefones: " . implode(',', $telefones);
	}
	$cursos = $aluno->getCursos();
	foreach ($cursos as $curso) {
		echo "\n\tId curso: " . $curso->getId()." nome: ".$curso->getNome()."\n";
	}
	echo "\n\n";
}

//debug de SQL executado 
//print_r($debugStack);
foreach ($debugStack->queries as $queryInfo) {
	echo $queryInfo['sql']."\n";
}
