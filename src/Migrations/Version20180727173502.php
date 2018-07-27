<?php declare (strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180727173502 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(1,"Morderna Cadeira Branca","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/1.jpg","180.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(2,"Morderna Cadeira","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/3.jpg","180.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(3,"Moderna Cadeira de Balanço","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/8.jpg","200.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(4,"Vaso de Planta","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/2.jpg","50.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(5,"Vaso de Planta","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/5.jpg","20.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(6,"Armario","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/4.jpg","250.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(7,"Mesa","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/6.jpg","180.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(8,"Banco Metálico","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/7.jpg","180.00");');
        $this->connection->exec('INSERT INTO produto(id, nome, descricao, imagem, preco) VALUES(9,"Enfeite de Decoração","Lorem ipsum dolor sit amet, consectetur adipisicing elit.","img/bg-img/9.jpg","318.00");');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
