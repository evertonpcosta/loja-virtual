O projeto foi desenvolvido usando PHP7 e Symfony4 com banco de dados MYSQL

# loja-virtual

Depois que clonar o projeto entrar na pasta:
cd loja-virtual

Intalar as dependencias do composer:
composer require symfony/web-server-bundle --dev

#Configurar os dados de conexão ao banco no arquivo .env
DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name

Criar o banco de dados:

php bin/console doctrine:database:create

Rodas as Migrations:
php bin/console doctrine:migrations:migrate

excuter o server :

php bin/console server:start 0.0.0.0:8000

usuário para acessar foi definido como padrão nas configs
user = everton
senha = 123456
