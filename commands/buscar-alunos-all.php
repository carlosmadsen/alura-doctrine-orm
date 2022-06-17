<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);
/** 
 * @var Aluno[] $alunoList 
 */
$alunoList = $alunoRepository->findAll();
foreach ($alunoList as $aluno) {
	$telefones = $aluno
    	->getTelefones()
    	->map(function (Telefone $telefone){
        	return $telefone->getNumero();
    	})
    	->toArray();
	$cursos = $aluno
    	->getCursos()
    	->map(function (Curso $curso){
        	return $curso->getNome();
    	})
    	->toArray();
	echo "Id: ".$aluno->getId()."\nNome: ".$aluno->getNome();
	echo "\nTelefones: " . implode(',', $telefones);
	echo "\nCursos: " . implode(',', $cursos);
	echo "\n\n";
}
