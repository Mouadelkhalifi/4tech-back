<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240504080521 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles CHANGE brand brand VARCHAR(255) DEFAULT NULL, CHANGE model model VARCHAR(255) DEFAULT NULL, CHANGE version version VARCHAR(255) DEFAULT NULL, CHANGE year year VARCHAR(255) DEFAULT NULL, CHANGE energy energy VARCHAR(255) DEFAULT NULL, CHANGE pics pics LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:simple_array)\', CHANGE gearbox gearbox VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vehicles CHANGE brand brand VARCHAR(255) DEFAULT \'NULL\', CHANGE model model VARCHAR(255) DEFAULT \'NULL\', CHANGE version version VARCHAR(255) DEFAULT \'NULL\', CHANGE year year VARCHAR(255) DEFAULT \'NULL\', CHANGE energy energy VARCHAR(255) DEFAULT \'NULL\', CHANGE pics pics LONGTEXT DEFAULT \'NULL\' COMMENT \'(DC2Type:simple_array)\', CHANGE gearbox gearbox VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
    }
}
