<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207174219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conseiller_creneau (conseiller_id INT NOT NULL, creneau_id INT NOT NULL, INDEX IDX_26CAF0F51AC39A0D (conseiller_id), INDEX IDX_26CAF0F57D0729A9 (creneau_id), PRIMARY KEY(conseiller_id, creneau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conseiller_creneau ADD CONSTRAINT FK_26CAF0F51AC39A0D FOREIGN KEY (conseiller_id) REFERENCES conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_creneau ADD CONSTRAINT FK_26CAF0F57D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE conseiller_creneau');
    }
}
