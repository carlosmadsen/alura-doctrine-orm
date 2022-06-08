<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$entityManagerFactory  = new EntityManagerFactory();
$entityManager  = $entityManagerFactory->getEntityManager();

$id = $argv[1];
$aluno = $entityManager->getReference(Aluno::class, $id); //cria objeto só com id sem fazer select no banco

$entityManager->remove($aluno);
$entityManager->flush(); 

