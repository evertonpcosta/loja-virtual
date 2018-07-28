<?php declare (strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180727171551 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->connection->exec('INSERT INTO categoria(id, nome) VALUES(1,"Decoração");');
        $this->connection->exec('INSERT INTO categoria(id, nome) VALUES(2,"Jardim e Lazer");');
        $this->connection->exec('INSERT INTO categoria(id, nome) VALUES(3,"Móveis");');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
