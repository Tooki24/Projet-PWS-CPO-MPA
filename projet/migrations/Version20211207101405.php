<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207101405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conseillier_langue DROP FOREIGN KEY FK_52651168464EE8E');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F868464EE8E');
        $this->addSql('CREATE TABLE conseiller (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(12) DEFAULT NULL, specialite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller_langue (conseiller_id INT NOT NULL, langue_id INT NOT NULL, INDEX IDX_5FC31C221AC39A0D (conseiller_id), INDEX IDX_5FC31C222AADBACD (langue_id), PRIMARY KEY(conseiller_id, langue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conseiller_langue ADD CONSTRAINT FK_5FC31C221AC39A0D FOREIGN KEY (conseiller_id) REFERENCES conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_langue ADD CONSTRAINT FK_5FC31C222AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE conseillier');
        $this->addSql('DROP TABLE conseillier_langue');
        $this->addSql('DROP INDEX IDX_10C31F868464EE8E ON rdv');
        $this->addSql('ALTER TABLE rdv CHANGE conseillier_id conseillers_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8699DA0202 FOREIGN KEY (conseillers_id) REFERENCES conseiller (id)');
        $this->addSql('CREATE INDEX IDX_10C31F8699DA0202 ON rdv (conseillers_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conseiller_langue DROP FOREIGN KEY FK_5FC31C221AC39A0D');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8699DA0202');
        $this->addSql('CREATE TABLE conseillier (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date_de_naissance DATE NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tel VARCHAR(12) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, specialite VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE conseillier_langue (conseillier_id INT NOT NULL, langue_id INT NOT NULL, INDEX IDX_52651162AADBACD (langue_id), INDEX IDX_52651168464EE8E (conseillier_id), PRIMARY KEY(conseillier_id, langue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE conseillier_langue ADD CONSTRAINT FK_52651168464EE8E FOREIGN KEY (conseillier_id) REFERENCES conseillier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseillier_langue ADD CONSTRAINT FK_52651162AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE conseiller');
        $this->addSql('DROP TABLE conseiller_langue');
        $this->addSql('DROP INDEX IDX_10C31F8699DA0202 ON rdv');
        $this->addSql('ALTER TABLE rdv CHANGE conseillers_id conseillier_id INT NOT NULL');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F868464EE8E FOREIGN KEY (conseillier_id) REFERENCES conseillier (id)');
        $this->addSql('CREATE INDEX IDX_10C31F868464EE8E ON rdv (conseillier_id)');
    }
}
