<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213141834 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE conseiller (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_de_naissance DATE NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(12) DEFAULT NULL, specialite VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller_langue (conseiller_id INT NOT NULL, langue_id INT NOT NULL, INDEX IDX_5FC31C221AC39A0D (conseiller_id), INDEX IDX_5FC31C222AADBACD (langue_id), PRIMARY KEY(conseiller_id, langue_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conseiller_creneau (conseiller_id INT NOT NULL, creneau_id INT NOT NULL, INDEX IDX_26CAF0F51AC39A0D (conseiller_id), INDEX IDX_26CAF0F57D0729A9 (creneau_id), PRIMARY KEY(conseiller_id, creneau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creneau (id INT AUTO_INCREMENT NOT NULL, status TINYINT(1) NOT NULL, semaine VARCHAR(255) NOT NULL, heure_debut DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE langue (id INT AUTO_INCREMENT NOT NULL, language VARCHAR(255) NOT NULL, file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rdv (id INT AUTO_INCREMENT NOT NULL, creneau_id INT NOT NULL, user_id INT DEFAULT NULL, conseillers_id INT NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_10C31F867D0729A9 (creneau_id), INDEX IDX_10C31F86A76ED395 (user_id), INDEX IDX_10C31F8699DA0202 (conseillers_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, langue_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, num_touriste INT NOT NULL, date_arrive DATE NOT NULL, date_depart DATE DEFAULT NULL, newletter TINYINT(1) NOT NULL, info_rdv LONGTEXT DEFAULT NULL, INDEX IDX_8D93D6492AADBACD (langue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conseiller_langue ADD CONSTRAINT FK_5FC31C221AC39A0D FOREIGN KEY (conseiller_id) REFERENCES conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_langue ADD CONSTRAINT FK_5FC31C222AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_creneau ADD CONSTRAINT FK_26CAF0F51AC39A0D FOREIGN KEY (conseiller_id) REFERENCES conseiller (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conseiller_creneau ADD CONSTRAINT FK_26CAF0F57D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F867D0729A9 FOREIGN KEY (creneau_id) REFERENCES creneau (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F86A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE rdv ADD CONSTRAINT FK_10C31F8699DA0202 FOREIGN KEY (conseillers_id) REFERENCES conseiller (id)');
        $this->addSql('ALTER TABLE `user` ADD CONSTRAINT FK_8D93D6492AADBACD FOREIGN KEY (langue_id) REFERENCES langue (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conseiller_langue DROP FOREIGN KEY FK_5FC31C221AC39A0D');
        $this->addSql('ALTER TABLE conseiller_creneau DROP FOREIGN KEY FK_26CAF0F51AC39A0D');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F8699DA0202');
        $this->addSql('ALTER TABLE conseiller_creneau DROP FOREIGN KEY FK_26CAF0F57D0729A9');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F867D0729A9');
        $this->addSql('ALTER TABLE conseiller_langue DROP FOREIGN KEY FK_5FC31C222AADBACD');
        $this->addSql('ALTER TABLE `user` DROP FOREIGN KEY FK_8D93D6492AADBACD');
        $this->addSql('ALTER TABLE rdv DROP FOREIGN KEY FK_10C31F86A76ED395');
        $this->addSql('DROP TABLE conseiller');
        $this->addSql('DROP TABLE conseiller_langue');
        $this->addSql('DROP TABLE conseiller_creneau');
        $this->addSql('DROP TABLE creneau');
        $this->addSql('DROP TABLE langue');
        $this->addSql('DROP TABLE rdv');
        $this->addSql('DROP TABLE `user`');
    }
}
