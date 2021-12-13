<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213131751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conseiller_creneau (conseiller_id INT NOT NULL, creneau_id INT NOT NULL, INDEX IDX_26CAF0F51AC39A0D (conseiller_id), INDEX IDX_26CAF0F57D0729A9 (creneau_id), PRIMARY KEY(conseiller_id, creneau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creneau (id INT AUTO_INCREMENT NOT NULL, status TINYINT(1) NOT NULL, semaine VARCHAR(255) NOT NULL, heure_debut TIME NOT NULL, day DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conseiller_creneau ADD CONSTRAINT FK_26CAF0F51AC39A0D FOREIGN KEY (conseiller_id) REFERENCES conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_creneau ADD CONSTRAINT FK_26CAF0F57D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rdv ADD creneau_id INT NOT NULL, DROP date, DROP heure');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F867D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id)');
        $this->addSql('CREATE INDEX IDX_10C31F867D0729A9 ON rdv (creneau_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conseiller_creneau DROP FOREIGN KEY FK_26CAF0F57D0729A9');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F867D0729A9');
        $this->addSql('DROP TABLE conseiller_creneau');
        $this->addSql('DROP TABLE creneau');
        $this->addSql('DROP INDEX IDX_10C31F867D0729A9 ON rdv');
        $this->addSql('ALTER TABLE rdv ADD date DATE NOT NULL, ADD heure TIME NOT NULL, DROP creneau_id');
    }
}
