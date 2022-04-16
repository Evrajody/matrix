<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220415165934  extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affection (id INT AUTO_INCREMENT NOT NULL, equipement_id INT NOT NULL, utilisateur_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_3E6C3E8D806F0F5C (equipement_id), INDEX IDX_3E6C3E8DFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prestataire (id INT AUTO_INCREMENT NOT NULL, nom_prestataire VARCHAR(255) NOT NULL, prenom_prestataire VARCHAR(255) NOT NULL, adresse_prestataire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE probleme (id INT AUTO_INCREMENT NOT NULL, affection_id INT NOT NULL, description LONGTEXT NOT NULL, date_panne DATE NOT NULL, date_mise_maintenance DATE DEFAULT NULL, has_solution TINYINT(1) DEFAULT NULL, INDEX IDX_7AB2D7148A6D7BD3 (affection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, equipement_id INT NOT NULL, prestataire_id INT NOT NULL, date_exp DATE NOT NULL, reference VARCHAR(255) NOT NULL, type_service VARCHAR(255) NOT NULL, INDEX IDX_E19D9AD2806F0F5C (equipement_id), INDEX IDX_E19D9AD2BE3DB2B7 (prestataire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution (id INT AUTO_INCREMENT NOT NULL, probleme_resolu_id INT NOT NULL, description LONGTEXT NOT NULL, date_remise DATE DEFAULT NULL, UNIQUE INDEX UNIQ_9F3329DBD222021B (probleme_resolu_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, prenom_utilisateur VARCHAR(255) NOT NULL, email_utilisateur VARCHAR(255) NOT NULL, phone_utilisateur VARCHAR(255) NOT NULL, adresse_utilisateur VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affection ADD CONSTRAINT FK_3E6C3E8D806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE affection ADD CONSTRAINT FK_3E6C3E8DFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE probleme ADD CONSTRAINT FK_7AB2D7148A6D7BD3 FOREIGN KEY (affection_id) REFERENCES affection (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2806F0F5C FOREIGN KEY (equipement_id) REFERENCES equipement (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2BE3DB2B7 FOREIGN KEY (prestataire_id) REFERENCES prestataire (id)');
        $this->addSql('ALTER TABLE solution ADD CONSTRAINT FK_9F3329DBD222021B FOREIGN KEY (probleme_resolu_id) REFERENCES probleme (id)');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F362122BA2');
        $this->addSql('DROP INDEX idx_b8b4c6f362122ba2 ON equipement');
        $this->addSql('CREATE INDEX IDX_B8B4C6F3670C757F ON equipement (fournisseur_id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F362122BA2 FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE probleme DROP FOREIGN KEY FK_7AB2D7148A6D7BD3');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2BE3DB2B7');
        $this->addSql('ALTER TABLE solution DROP FOREIGN KEY FK_9F3329DBD222021B');
        $this->addSql('ALTER TABLE affection DROP FOREIGN KEY FK_3E6C3E8DFB88E14F');
        $this->addSql('DROP TABLE affection');
        $this->addSql('DROP TABLE prestataire');
        $this->addSql('DROP TABLE probleme');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE solution');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE equipement DROP FOREIGN KEY FK_B8B4C6F3670C757F');
        $this->addSql('DROP INDEX idx_b8b4c6f3670c757f ON equipement');
        $this->addSql('CREATE INDEX IDX_B8B4C6F362122BA2 ON equipement (fournisseur_id)');
        $this->addSql('ALTER TABLE equipement ADD CONSTRAINT FK_B8B4C6F3670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
    }
}
