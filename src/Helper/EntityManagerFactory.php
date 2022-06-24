<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory {

	public function getEntityManager(): EntityManagerInterface {
		$rootDir = __DIR__ . '/../..';
		$config = Setup::createAnnotationMetadataConfiguration(
			[$rootDir . '/src'],
			true
		);
		//sqlite 
		$connection = [
			'driver' => 'pdo_sqlite',
			'path' => $rootDir . '/var/data/banco.sqlite'
		];
		//postgresql 
		/*$connection = [
			'driver' => 'pdo_pgsql',
			'host' => 'localhost',
			'port' => '5432',
			'database' => 'banco',
			'user' => 'usuario',
			'password' => 'senha'
		];*/
		//mysql 		
		/*$connection = [
			'driver' => 'pdo_mysql',
			'host' => 'localhost',
			'dbname' => 'curso_doctrine',
			'user' => 'root',
			'password' => 'senhalura'
		];*/
		$em = EntityManager::create($connection, $config);
		return $em;
	}

}