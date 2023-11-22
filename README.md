## :package: Stack

- **PHP 8.10** de Linguagem de programação.
- **Laravel 10.32.1** para o framework.
- **PostgreSQL** para o banco de dados.
- **Redis** como driver de cache.

## :clipboard: Comandos
Para preparar o seu ambiente de desenvolvimento, utilize os códigos fornecidos abaixo. A seguir, apresentarei alguns comandos para otimizar o ambiente e deixá-lo pronto para testes.

### :blue_book: Database:
Primeiro, acesse o projeto e navegue até o diretório .env para realizar a configuração do USERNAME e da PASSWORD referente ao seu banco de dados PostgreSQL.

Em seguida, use o comando a seguir no **Query Tool** do **pgAdmin** para gerar o banco de dados denominado de "hotelaria".

	CREATE DATABASE hotelaria;
Após concluir essas etapas, seu banco de dados foi criado com sucesso.
### :closed_book: Redis:
Com o Redis instalado em sua máquina, utilize o comando abaixo no terminal para habilitar a interação com o Redis.
	
    redis-cli
### :green_book: Migrate e Seeder:
O Migrate e o Seeder têm a função de criar tabelas e preencher seu banco de dados. Execute os comandos a seguir na pasta do projeto.

Migrate:

    php artisan migrate
Seeder:

    php artisan db:seed

## :mag_right: Observações Finais

- Certifique-se de que o código é limpo, bem comentado e segue as melhores práticas do Laravel.
- Você pode utilizar as versões mais recentes do Laravel, PostgreSQL e Redis.
- O teste pode ser feito em um projeto Laravel novo ou em um projeto existente, conforme apropriado.
- Esse teste abrange tópicos relacionados à gestão de quartos e reservas em um contexto hoteleiro, utilizando Laravel, PostgreSQL e Redis.
- **OBSERVAÇÃO:** O teste pode ser feito só como api ou não.
No caso de API o teste tem que ter uma documentação de teste para ser testado via Postman.
