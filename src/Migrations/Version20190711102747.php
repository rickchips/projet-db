<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711102747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_personnage');
        $this->addSql('DROP INDEX UNIQ_8D93D64912A5F6CC ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649EA5002AD ON user');
        $this->addSql('ALTER TABLE user ADD pseudo VARCHAR(180) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD roles JSON NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP pseudo_user, DROP email_user, DROP mdp_user, DROP role');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON user (pseudo)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_personnage (user_id INT NOT NULL, personnage_id INT NOT NULL, INDEX IDX_CD8D8E81A76ED395 (user_id), INDEX IDX_CD8D8E815E315342 (personnage_id), PRIMARY KEY(user_id, personnage_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_personnage ADD CONSTRAINT FK_CD8D8E815E315342 FOREIGN KEY (personnage_id) REFERENCES personnage (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_personnage ADD CONSTRAINT FK_CD8D8E81A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP INDEX UNIQ_8D93D64986CC499D ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD pseudo_user VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, ADD email_user VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, ADD mdp_user VARCHAR(64) NOT NULL COLLATE utf8mb4_unicode_ci, ADD role VARCHAR(64) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP pseudo, DROP email, DROP roles, DROP password');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64912A5F6CC ON user (email_user)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649EA5002AD ON user (pseudo_user)');
    }
}
