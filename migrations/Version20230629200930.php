<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230629200930 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activite (id INT AUTO_INCREMENT NOT NULL, type_activite_id INT DEFAULT NULL, commune_id INT DEFAULT NULL, titre_realisation VARCHAR(63) DEFAULT NULL, description LONGTEXT DEFAULT NULL, en_projet TINYINT(1) NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, image_url VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_B8755515AC9C95FD (image_url), INDEX IDX_B8755515D0165F20 (type_activite_id), INDEX IDX_B8755515131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commune (id INT AUTO_INCREMENT NOT NULL, nom_commune VARCHAR(63) NOT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pre_commande (id INT AUTO_INCREMENT NOT NULL, nom_structure VARCHAR(63) NOT NULL, nom_demandeur VARCHAR(63) NOT NULL, prenom_demandeur VARCHAR(63) NOT NULL, email_demandeur VARCHAR(320) NOT NULL, UNIQUE INDEX UNIQ_683C942E69563938 (email_demandeur), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_activite (id INT AUTO_INCREMENT NOT NULL, type_activite VARCHAR(50) NOT NULL, description_type_activite VARCHAR(50) DEFAULT NULL, date_creation DATETIME NOT NULL, date_modification DATETIME NOT NULL, UNIQUE INDEX UNIQ_758A72E9758A72E9 (type_activite), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515D0165F20 FOREIGN KEY (type_activite_id) REFERENCES type_activite (id)');
        $this->addSql('ALTER TABLE activite ADD CONSTRAINT FK_B8755515131A4F72 FOREIGN KEY (commune_id) REFERENCES commune (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515D0165F20');
        $this->addSql('ALTER TABLE activite DROP FOREIGN KEY FK_B8755515131A4F72');
        $this->addSql('DROP TABLE activite');
        $this->addSql('DROP TABLE commune');
        $this->addSql('DROP TABLE pre_commande');
        $this->addSql('DROP TABLE type_activite');
    }
}
