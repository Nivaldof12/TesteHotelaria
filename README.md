<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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
Após executar todos esses comandos, execute o comando abaixo para iniciar a aplicação.

    php artisan serve

## :pushpin: Teste

### Parte 1:

1.1 Crie uma rota em Laravel que corresponda a um controlador chamado QuartoController e ao método listarDisponiveis.
O método listarDisponiveis deve retornar uma lista de quartos disponíveis para reserva. Utilize Eloquent para acessar os dados.

### :round_pushpin: Endpoint 1.1

1.2 Crie um modelo Eloquent chamado Reserva para a tabela reservas.
Adicione um método no modelo para recuperar todas as reservas feitas por um cliente específico.

### :round_pushpin: Endpoint 1.2

## :round_pushpin: Endpoints
![endpoints](https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/a559e04f-a993-4ad3-8d1a-e1fa690414b2)
## :mag_right: Observações Finais

- Certifique-se de que o código é limpo, bem comentado e segue as melhores práticas do Laravel.
- Você pode utilizar as versões mais recentes do Laravel, PostgreSQL e Redis.
- O teste pode ser feito em um projeto Laravel novo ou em um projeto existente, conforme apropriado.
- Esse teste abrange tópicos relacionados à gestão de quartos e reservas em um contexto hoteleiro, utilizando Laravel, PostgreSQL e Redis.
- A aplicação deve usar autenticação para todas as rotas.
- **OBSERVAÇÃO:** O teste pode ser feito só como api ou não.
No caso de API o teste tem que ter uma documentação de teste para ser testado via Postman.
