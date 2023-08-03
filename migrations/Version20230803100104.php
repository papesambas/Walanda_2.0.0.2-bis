<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803100104 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves CHANGE date_naissance date_naissance DATE NOT NULL, CHANGE date_extrait date_extrait DATE NOT NULL, CHANGE date_inscription date_inscription DATE NOT NULL, CHANGE date_recrutement date_recrutement DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves CHANGE date_naissance date_naissance DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_extrait date_extrait DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_inscription date_inscription DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date_recrutement date_recrutement DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
