<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);

$alunoRepository = $entityManager->getRepository(Aluno::class);
$alunoList1 = $alunoRepository->findAll();
echo "Total de alunos: ".count($alunoList1)."\n";

$classeAluno = Aluno::class;
$dql = "SELECT 
	COUNT(a)  
FROM {$classeAluno} a  
";
$query = $entityManager->createQuery($dql);
$total = $query->getSingleScalarResult();
echo "Total de alunos (DQL): ".$total."\n";

//debug de SQL executado 
//print_r($debugStack);
foreach ($debugStack->queries as $queryInfo) {
	echo $queryInfo['sql']."\n";
}
