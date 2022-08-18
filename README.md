# alura-doctrine-orm
## Descrição do Projeto:
Exercícios do curso de Doctrine ORM da Alura
## Requisitos:
Ter instalado o composer e o PHP (versão 7.3 ou superior) com com extensão do pdo_sqlite habilitada.
No windows tem de descomentar (remover o ;) a linha "extension=pdo_sqlite" no arquivo php.ini.
## Instalação:
No terminal: 
```
git clone https://github.com/carlosmadsen/alura-doctrine-orm.git
cd alura-doctrine-orm
composer install
mkdir var 
mkdir var/data
mkdir src/Migrations/Component
```
Criação do banco de dados sqlite.
```
php .\commands\doctrine.php orm:schema-tool:create
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

Ciando um aluno com telefone:
```
php .\commands\criar-aluno.php "Maria da Silva" "(53) 99148-5555"
```

Ver outros arquivos com exemplos e execícios na pasta **commands**. 