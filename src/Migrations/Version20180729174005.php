<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180729174005 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE produto (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, descricao VARCHAR(255) NOT NULL, imagem VARCHAR(255) NOT NULL, preco NUMERIC(7, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produto_categoria (id INT AUTO_INCREMENT NOT NULL, produto_id INT DEFAULT NULL, categoria_id INT DEFAULT NULL, INDEX IDX_D5E7E35C105CFD56 (produto_id), INDEX IDX_D5E7E35C3397707A (categoria_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE carrinho (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, status INT NOT NULL, total NUMERIC(10, 2) NOT NULL, INDEX IDX_A731E3C0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE item_carrinho (id INT AUTO_INCREMENT NOT NULL, carrinho_id INT DEFAULT NULL, produto_id INT DEFAULT NULL, quantidade INT NOT NULL, total NUMERIC(10, 2) NOT NULL, INDEX IDX_CB3C2B0BD363F3C2 (carrinho_id), INDEX IDX_CB3C2B0B105CFD56 (produto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produto_categoria ADD CONSTRAINT FK_D5E7E35C105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id)');
        $this->addSql('ALTER TABLE produto_categoria ADD CONSTRAINT FK_D5E7E35C3397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id)');
        $this->addSql('ALTER TABLE carrinho ADD CONSTRAINT FK_A731E3C0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE item_carrinho ADD CONSTRAINT FK_CB3C2B0BD363F3C2 FOREIGN KEY (carrinho_id) REFERENCES carrinho (id)');
        $this->addSql('ALTER TABLE item_carrinho ADD CONSTRAINT FK_CB3C2B0B105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produto_categoria DROP FOREIGN KEY FK_D5E7E35C105CFD56');
        $this->addSql('ALTER TABLE item_carrinho DROP FOREIGN KEY FK_CB3C2B0B105CFD56');
        $this->addSql('ALTER TABLE produto_categoria DROP FOREIGN KEY FK_D5E7E35C3397707A');
        $this->addSql('ALTER TABLE carrinho DROP FOREIGN KEY FK_A731E3C0A76ED395');
        $this->addSql('ALTER TABLE item_carrinho DROP FOREIGN KEY FK_CB3C2B0BD363F3C2');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE produto_categoria');
        $this->addSql('DROP TABLE carrinho');
        $this->addSql('DROP TABLE item_carrinho');
    }
}
