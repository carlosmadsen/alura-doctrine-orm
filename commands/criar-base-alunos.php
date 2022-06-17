<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

$dados = [
	[
		'nome' => 'Carlos Alberto',
		'telefones' => ['(53) 99148-6996', '(53) 3233-6599']
	],
	[
		'nome' => 'Carlos Roberto',
		'telefones' => ['(53) 991485599']
	],
	[
		'nome' => 'Carlos Eduardo',
		'telefones' => []
	],
	[
		'nome' => 'Fábio Pereira',
		'telefones' => []
	],
	[
		'nome' => 'Maria da Silva',
		'telefones' => []
	],
	[
		'nome' => 'José da Silva',
		'telefones' => []
	],
	[
		'nome' => 'Denise Silveira',
		'telefones' => []
	],
	[
		'nome' => 'Thais Cruz',
		'telefones' => ['(53) 3235-6699']
	],
	[
		'nome' => 'Adroaldo Silveira',
		'telefones' => []
	],
	[
		'nome' => 'Érica Barros',
		'telefones' => []
	]
];

try {
	$entityManagerFactory  = new EntityManagerFactory();
	$entityManager  = $entityManagerFactory->getEntityManager();

	$curso = new Curso();
	$curso->setNome("Engenharia");

	foreach ($dados as $d) {
		$aluno = new Aluno();
		$aluno->setNome($d['nome']);
		if (!empty($d['telefones'])) {
			foreach ($d['telefones'] as $numeroTelefone) {
				$telefone = new Telefone();
				$telefone->setNumero($numeroTelefone);
				$aluno->addTelefone($telefone);
			}
		}
		$aluno->addCurso($curso);
		$entityManager->persist($aluno); 
		$entityManager->flush(); 
	}	
}
catch (Exception $e) {
	echo $e->getMessage()."\n";
}