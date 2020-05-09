<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508201314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE xt_coupon (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(20) NOT NULL, discount INT NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_book (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, price NUMERIC(10, 0) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_book_xt_category (xt_book_id INT NOT NULL, xt_category_id INT NOT NULL, INDEX IDX_453F9250AC93B256 (xt_book_id), INDEX IDX_453F925045EE2BD5 (xt_category_id), PRIMARY KEY(xt_book_id, xt_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE xt_book_xt_category ADD CONSTRAINT FK_453F9250AC93B256 FOREIGN KEY (xt_book_id) REFERENCES xt_book (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE xt_book_xt_category ADD CONSTRAINT FK_453F925045EE2BD5 FOREIGN KEY (xt_category_id) REFERENCES xt_category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE xt_book_xt_category DROP FOREIGN KEY FK_453F9250AC93B256');
        $this->addSql('ALTER TABLE xt_book_xt_category DROP FOREIGN KEY FK_453F925045EE2BD5');
        $this->addSql('DROP TABLE xt_coupon');
        $this->addSql('DROP TABLE xt_book');
        $this->addSql('DROP TABLE xt_book_xt_category');
        $this->addSql('DROP TABLE xt_category');
    }
}
