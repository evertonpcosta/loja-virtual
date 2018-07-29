<?php declare (strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180729123715 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // this up() migration is auto-generated, please modify it to your needs

        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(1,1,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(2,2,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(3,3,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(4,4,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(5,5,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(6,6,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(7,7,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(8,8,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(9,9,3);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(10,4,2);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(11,5,2);');
        $this->connection->exec('INSERT INTO produto_categoria(id, produto_id, categoria_id) VALUES(12,9,1);');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
