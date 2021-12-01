<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201081305 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD langue_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492AADBACD ON user (langue_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6492AADBACD');
        $this->addSql('DROP INDEX IDX_8D93D6492AADBACD ON `user`');
        $this->addSql('ALTER TABLE `user` DROP langue_id');
    }
}
