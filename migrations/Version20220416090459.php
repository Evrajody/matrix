<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220416090459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
       $this->addSql('ALTER TABLE `utilisateur` CHANGE `phone_utilisateur` `phone_utilisateur` VARCHAR(255) NOT NULL');
       $this->addSql('ALTER TABLE `equipement` ADD UNIQUE(`ref`)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
