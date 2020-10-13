<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201013162441 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, comment VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_note (user_id INT NOT NULL, note_id INT NOT NULL, INDEX IDX_B53CB6DDA76ED395 (user_id), INDEX IDX_B53CB6DD26ED0855 (note_id), PRIMARY KEY(user_id, note_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_note ADD CONSTRAINT FK_B53CB6DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_note ADD CONSTRAINT FK_B53CB6DD26ED0855 FOREIGN KEY (note_id) REFERENCES note (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_note DROP FOREIGN KEY FK_B53CB6DD26ED0855');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE user_note');
        $this->addSql('ALTER TABLE user DROP email, DROP password');
    }
}
