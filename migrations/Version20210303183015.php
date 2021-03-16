<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303183015 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE race (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE race_attribute (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, type VARCHAR(255) NOT NULL, strength INT NOT NULL, agility INT NOT NULL, intellect INT NOT NULL, will INT NOT NULL, luck INT NOT NULL, INDEX IDX_23FCAFE66E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE racial_bonus (id INT AUTO_INCREMENT NOT NULL, race_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_1CDBAC816E59D40D (race_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, abbreviation VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, accuracy INT NOT NULL, evasion INT NOT NULL, conjure INT NOT NULL, resist INT NOT NULL, insight INT NOT NULL, physical_damage INT NOT NULL, magical_damage INT NOT NULL, initiative INT NOT NULL, health_point INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE race_attribute ADD CONSTRAINT FK_23FCAFE66E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
        $this->addSql('ALTER TABLE racial_bonus ADD CONSTRAINT FK_1CDBAC816E59D40D FOREIGN KEY (race_id) REFERENCES race (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE race_attribute DROP FOREIGN KEY FK_23FCAFE66E59D40D');
        $this->addSql('ALTER TABLE racial_bonus DROP FOREIGN KEY FK_1CDBAC816E59D40D');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE race_attribute');
        $this->addSql('DROP TABLE racial_bonus');
        $this->addSql('DROP TABLE style');
    }
}
