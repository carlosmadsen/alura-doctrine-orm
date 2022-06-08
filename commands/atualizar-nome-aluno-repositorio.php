<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$alunoRepository = $entityManager->getRepository(Aluno::class);

$id = $argv[1];
$novoNome = $argv[2];

$aluno = $alunoRepository->find($id);
echo "Nome original: ".$aluno->getNome()."\n";
$aluno->setNome($novoNome);

//$entityManager->persist($aluno); //não precisa porque comoveio de pesquisa usando o doctrine ele já está observando esse objeto  
$entityManager->flush(); //executando os comandos no banco 

echo "Nome atualizado: ".$aluno->getNome()."\n";
