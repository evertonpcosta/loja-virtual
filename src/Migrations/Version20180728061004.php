<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180728061004 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produto_categoria ADD categoria_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produto_categoria ADD CONSTRAINT FK_D5E7E35C3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('CREATE INDEX IDX_D5E7E35C3397707A ON produto_categoria (categoria_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produto_categoria DROP FOREIGN KEY FK_D5E7E35C3397707A');
        $this->addSql('DROP INDEX IDX_D5E7E35C3397707A ON produto_categoria');
        $this->addSql('ALTER TABLE produto_categoria DROP categoria_id');
    }
}
