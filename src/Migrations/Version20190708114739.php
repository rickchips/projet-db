<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190708114739 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liens (id INT AUTO_INCREMENT NOT NULL, nom_liens VARCHAR(128) NOT NULL, nb_ki_liens INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage (id INT AUTO_INCREMENT NOT NULL, nom_perso VARCHAR(128) NOT NULL, apt_leader_perso VARCHAR(255) DEFAULT NULL, apt_pass_perso VARCHAR(255) DEFAULT NULL, image_perso VARCHAR(64) NOT NULL, date_creation_perso DATETIME NOT NULL, date_modif_perso DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_liens (personnage_id INT NOT NULL, liens_id INT NOT NULL, INDEX IDX_AF3B6865E315342 (personnage_id), INDEX IDX_AF3B68662F9273E (liens_id), PRIMARY KEY(personnage_id, liens_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personnage_categorie (personnage_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_786473F45E315342 (personnage_id), INDEX IDX_786473F4BCF5E72D (categorie_id), PRIMARY KEY(personnage_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, pseudo_user VARCHAR(64) NOT NULL, email_user VARCHAR(64) NOT NULL, mdp_user VARCHAR(64) NOT NULL, role VARCHAR(64) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649EA5002AD (pseudo_user), UNIQUE INDEX UNIQ_8D93D64912A5F6CC (email_user), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_personnage (user_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_CD8D8E81A76ED395 (user_id), INDEX IDX_CD8D8E815E315342 (personnage_id), PRIMARY KEY(user_id, personnage_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personnage_liens ADD CONSTRAINT FK_AF3B6865E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_liens ADD CONSTRAINT FK_AF3B68662F9273E FOREIGN KEY (liens_id) REFERENCES liens (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_categorie ADD CONSTRAINT FK_786473F45E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personnage_categorie ADD CONSTRAINT FK_786473F4BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_personnage ADD CONSTRAINT FK_CD8D8E81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_personnage ADD CONSTRAINT FK_CD8D8E815E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE personnage_categorie DROP FOREIGN KEY FK_786473F4BCF5E72D');
        $this->addSql('ALTER TABLE personnage_liens DROP FOREIGN KEY FK_AF3B68662F9273E');
        $this->addSql('ALTER TABLE personnage_liens DROP FOREIGN KEY FK_AF3B6865E315342');
        $this->addSql('ALTER TABLE personnage_categorie DROP FOREIGN KEY FK_786473F45E315342');
        $this->addSql('ALTER TABLE user_personnage DROP FOREIGN KEY FK_CD8D8E815E315342');
        $this->addSql('ALTER TABLE user_personnage DROP FOREIGN KEY FK_CD8D8E81A76ED395');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE liens');
        $this->addSql('DROP TABLE personnage');
        $this->addSql('DROP TABLE personnage_liens');
        $this->addSql('DROP TABLE personnage_categorie');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_personnage');
    }
}
