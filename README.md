# alura-doctrine-orm
## Descrição do Projeto:
Exercícios do curso de Doctrine ORM da Alura
## Requisitos:
Ter instalado o composer e o PHP com com extensão do pdo_sqlite habilitada.
## Instalação:
No terminal dentro da pasta do projeto: 
```
composer install
composer require doctrine/migrations:* --with-all-dependencies
composer dumpautoload
mkdir var 
mkdir var/data
```
Criação do banco de dados sqlite (no windows).
```
.\vendor\bin\doctrine.bat orm:schema-tool:create
```
## Exemplo de uso:
No terminal dentro da pasta do projeto: 

Criando base inicial com 10 alunos: 
```
php .\commands\criar-base-alunos.php
```

Listando todos alunos: 
```
php .\commands\buscar-alunos-all.php
```
Ver outros arquivos com exemplos e execícios na pasta **commands**. 