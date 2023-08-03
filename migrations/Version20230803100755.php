<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803100755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves ADD pere_id INT NOT NULL, ADD mere_id INT NOT NULL');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B13FD73900 FOREIGN KEY (pere_id) REFERENCES peres (id)');
        $this->addSql('ALTER TABLE eleves ADD CONSTRAINT FK_383B09B139DEC40E FOREIGN KEY (mere_id) REFERENCES meres (id)');
        $this->addSql('CREATE INDEX IDX_383B09B13FD73900 ON eleves (pere_id)');
        $this->addSql('CREATE INDEX IDX_383B09B139DEC40E ON eleves (mere_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B13FD73900');
        $this->addSql('ALTER TABLE eleves DROP FOREIGN KEY FK_383B09B139DEC40E');
        $this->addSql('DROP INDEX IDX_383B09B13FD73900 ON eleves');
        $this->addSql('DROP INDEX IDX_383B09B139DEC40E ON eleves');
        $this->addSql('ALTER TABLE eleves DROP pere_id, DROP mere_id');
    }
}
