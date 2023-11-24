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
- **Breeze** para fazer autenticação.

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

### :round_pushpin: Endpoint 1.1

#### 1.1 Crie uma rota em Laravel que corresponda a um controlador chamado QuartoController e ao método listarDisponiveis. O método listarDisponiveis deve retornar uma lista de quartos disponíveis para reserva. Utilize Eloquent para acessar os dados.
Criei o Controller QuartoController e o método listarDisponiveis. O endpoint a seguir está exibindo os quartos disponíveis para reserva com base no valor booleano "true" da coluna "disponivel":

    /quartos/disponiveis

### :round_pushpin: Endpoint 1.2

#### 1.2 Crie um modelo Eloquent chamado Reserva para a tabela reservas. Adicione um método no modelo para recuperar todas as reservas feitas por um cliente específico.

Eu disponibilizei dois endpoints para recuperar as reservas feitas por um cliente específico:

Recuperando cliente específico por e-mail:

    /reservas/{email?}
Recuperando cliente específico por ID do cliente:

    /reservas/id/{clienteId}
Além disso, desenvolvi o endpoint para listar todas as reservas:

    /reservas

### :round_pushpin: Endpoint 1.3

#### Escreva uma consulta SQL para encontrar todos os quartos que estão ocupados em uma data específica.
No exemplo abaixo, estou consultando todos os quartos ocupados em 22/11/2023:

    SELECT DISTINCT quartos.* FROM quartos JOIN reservas ON quartos.id = reservas.quarto_id WHERE '2023-11-22' BETWEEN reservas.data_checkin AND reservas.data_checkout;

Endpoint para visualizar todos os quartos que estão ocupados em uma data específica. No exemplo abaixo, estou consultando todos os quartos ocupados em 22/11/2023:

    /quartos?data=2023-11-25

Também criei um endpoint para apresentar os dados de uma perspectiva diferente. Em vez de visualizar os quartos, desenvolvi uma API para mostrar todas as reservas ocupadas por data, no exemplo abaixo, estou consultando todas as reservas ocupadas em 22/11/2023:

    /reservas?data=2023-11-22

### :round_pushpin: Endpoint 1.4

#### Liste reservas de clientes com um campo id, crie um relacionamento no modelo Cliente que retorne todas as reservas associadas a esse cliente.
No endpoint abaixo, as reservas estão sendo retornadas a partir do id do cliente:
    
    /reservas/id/{clienteId}

## :red_circle: Redis

### 1.1 No arquivo de configuração do Laravel, configure o Laravel para usar Redis como driver de cache. Certifique-se de que o Laravel utilize Redis para armazenar informações temporárias relevantes para reservas. 
Configurei o Laravel para usar o Redis como driver de cache e configurei o redis para armazenar uma informação temporária relevante para reservas.

Quando o endpoint `/reservas/{email?}` é utilizado ele armazenado por 10 minutos a reserva do cliente que foi consultado.

Assim que você acessar `/reservas/{email?}`, já pode utilizar a chave abaixo:

    GET reservas_$email

<div align="center">
    <img src="https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/bbf2cbb3-b40e-4bba-a0aa-b02222295c9a" alt="Chave quartos_disponiveis" >
    <img src="https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/2d4722ce-d8d2-41c4-a444-40d0c11b30a9" alt="Chave quartos_disponiveis" >
</div>

### 1.2 Escreva um código que armazene temporariamente no Redis a lista de quartos disponíveis obtida na primeira questão, utilizando uma chave chamada quartos_disponiveis. Recupere essa lista do Redis e retorne-a como resposta atualizando a parte 1.1 do Teste.
Eu fiz a chave quartos_disponiveis e ela armazena as informações em cache do endpoint "**/quartos/disponiveis**" por 10 minutos.

Assim que você acessar `/quartos/disponiveis`, já pode utilizar a chave abaixo:

    GET quartos_disponiveis
<div align="center">
    <img src="https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/ed6aefe0-325c-44d4-8c15-56e555814a6c" alt="API quartos disponíveis" >
    <img src="https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/224761f6-d648-4245-91b2-5e04c91f61ac" alt="Chave quartos_disponiveis" >
</div>

## :round_pushpin: Endpoints

<div align="center">
    <img src="https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/9859773c-42c2-4526-949a-9cd7d827817c" alt="Endpoints" >
</div>

## :scissors: Não está conseguindo testar a API via Postman?
#### Para desativar a autenticação, vá até /routes/web.php e comente o código nas linhas **26** e **48**.
#### Dessa forma:

<div align="center">
    <img src="https://github.com/Nivaldof12/TesteHotelaria/assets/88409759/8eac8309-1806-4ebe-90d0-25cfded8f347" alt="comentando código" >
</div>

## :mag_right: Observações Finais

- Certifique-se de que o código é limpo, bem comentado e segue as melhores práticas do Laravel.
- Você pode utilizar as versões mais recentes do Laravel, PostgreSQL e Redis.
- O teste pode ser feito em um projeto Laravel novo ou em um projeto existente, conforme apropriado.
- Esse teste abrange tópicos relacionados à gestão de quartos e reservas em um contexto hoteleiro, utilizando Laravel, PostgreSQL e Redis.
- A aplicação deve usar autenticação para todas as rotas.
- **OBSERVAÇÃO:** O teste pode ser feito só como api ou não.
No caso de API o teste tem que ter uma documentação de teste para ser testado via Postman.
