<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213120450 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneau ADD status TINYINT(1) NOT NULL, ADD semaine VARCHAR(255) NOT NULL, DROP heure_fin, CHANGE heure_denut heure_debut TIME NOT NULL, CHANGE date day DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creneau ADD heure_fin TIME DEFAULT NULL, DROP status, DROP semaine, CHANGE day date DATE NOT NULL, CHANGE heure_debut heure_denut TIME NOT NULL');
    }
}
