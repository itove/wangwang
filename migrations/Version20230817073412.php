<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230817073412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ord_items (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, ord_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_2EBB00B24584665A (product_id), INDEX IDX_2EBB00B2E636D3F5 (ord_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ord_items ADD CONSTRAINT FK_2EBB00B24584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE ord_items ADD CONSTRAINT FK_2EBB00B2E636D3F5 FOREIGN KEY (ord_id) REFERENCES ord (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ord_items DROP FOREIGN KEY FK_2EBB00B24584665A');
        $this->addSql('ALTER TABLE ord_items DROP FOREIGN KEY FK_2EBB00B2E636D3F5');
        $this->addSql('DROP TABLE ord_items');
    }
}
