<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200508050139 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE xt_coupon (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_cart (id INT AUTO_INCREMENT NOT NULL, user INT NOT NULL, book INT NOT NULL, count INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_book (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(10, 0) DEFAULT \'0.00\' NOT NULL, cover VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_invoice_items (id INT AUTO_INCREMENT NOT NULL, invoice_id INT NOT NULL, book_id INT NOT NULL, count INT NOT NULL, price NUMERIC(10, 0) DEFAULT \'0.00\' NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_invoice (id INT AUTO_INCREMENT NOT NULL, price NUMERIC(10, 0) DEFAULT \'0.00\' NOT NULL, user INT NOT NULL, status VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_book_category (id INT AUTO_INCREMENT NOT NULL, book INT NOT NULL, category INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE xt_category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE xt_coupon');
        $this->addSql('DROP TABLE xt_cart');
        $this->addSql('DROP TABLE xt_book');
        $this->addSql('DROP TABLE xt_invoice_items');
        $this->addSql('DROP TABLE xt_invoice');
        $this->addSql('DROP TABLE xt_book_category');
        $this->addSql('DROP TABLE xt_category');
    }
}
