<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210421113525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE block ADD section_id INT DEFAULT NULL, ADD poucentage LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE block ADD CONSTRAINT FK_831B9722D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_831B9722D823E37A ON block (section_id)');
        $this->addSql('ALTER TABLE blog ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE blog ADD CONSTRAINT FK_C0155143A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C0155143A76ED395 ON blog (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blog DROP FOREIGN KEY FK_C0155143A76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE block DROP FOREIGN KEY FK_831B9722D823E37A');
        $this->addSql('DROP INDEX IDX_831B9722D823E37A ON block');
        $this->addSql('ALTER TABLE block DROP section_id, DROP poucentage');
        $this->addSql('DROP INDEX IDX_C0155143A76ED395 ON blog');
        $this->addSql('ALTER TABLE blog DROP user_id');
    }
}
