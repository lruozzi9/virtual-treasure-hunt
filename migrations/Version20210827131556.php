<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827131556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE answer_translation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_translation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE answer_translation (id INT NOT NULL, translatable_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, locale VARCHAR(5) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7567D54C2C2AC5D3 ON answer_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX answer_translation_unique_translation ON answer_translation (translatable_id, locale)');
        $this->addSql('CREATE TABLE question_translation (id INT NOT NULL, translatable_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, locale VARCHAR(5) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_576D9AE22C2AC5D3 ON question_translation (translatable_id)');
        $this->addSql('CREATE UNIQUE INDEX question_translation_unique_translation ON question_translation (translatable_id, locale)');
        $this->addSql('ALTER TABLE answer_translation ADD CONSTRAINT FK_7567D54C2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES answer (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE question_translation ADD CONSTRAINT FK_576D9AE22C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES question (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE answer_translation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_translation_id_seq CASCADE');
        $this->addSql('DROP TABLE answer_translation');
        $this->addSql('DROP TABLE question_translation');
    }
}
