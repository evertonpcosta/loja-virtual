<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180729182629 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carrinho ADD endereco_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE carrinho ADD CONSTRAINT FK_A731E3C01BB76823 FOREIGN KEY (endereco_id) REFERENCES endereco (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A731E3C01BB76823 ON carrinho (endereco_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE carrinho DROP FOREIGN KEY FK_A731E3C01BB76823');
        $this->addSql('DROP INDEX UNIQ_A731E3C01BB76823 ON carrinho');
        $this->addSql('ALTER TABLE carrinho DROP endereco_id');
    }
}
