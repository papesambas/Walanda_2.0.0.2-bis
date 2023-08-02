<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230802205438 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cercles (id INT AUTO_INCREMENT NOT NULL, region_id INT NOT NULL, designation VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_45C1718D8947610D (designation), INDEX IDX_45C1718D98260155 (region_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classes (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, designation VARCHAR(150) NOT NULL, capacite INT NOT NULL, effectif INT DEFAULT NULL, disponibilite INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_2ED7EC58947610D (designation), INDEX IDX_2ED7EC5B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE communes (id INT AUTO_INCREMENT NOT NULL, cercle_id INT NOT NULL, designation VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_5C5EE2A527413AB9 (cercle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cycles (id INT AUTO_INCREMENT NOT NULL, enseignement_id INT DEFAULT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_72B88B248947610D (designation), INDEX IDX_72B88B24ABEC3B20 (enseignement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departements (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_CF7489B28947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departements_niveaux (departements_id INT NOT NULL, niveaux_id INT NOT NULL, INDEX IDX_5014DEFB1DB279A6 (departements_id), INDEX IDX_5014DEFBAAC4B70E (niveaux_id), PRIMARY KEY(departements_id, niveaux_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dossier_eleves (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ecole_provenances (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_59378F8C8947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignements (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_89D792808947610D (designation), INDEX IDX_89D79280FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissements (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, forme_juridique VARCHAR(150) NOT NULL, adresse VARCHAR(255) NOT NULL, num_decision_creation VARCHAR(60) NOT NULL, num_decision_ouverture VARCHAR(60) NOT NULL, date_ouverture DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', num_social VARCHAR(60) DEFAULT NULL, num_fiscal VARCHAR(60) DEFAULT NULL, telephone VARCHAR(25) NOT NULL, telephone_mobile VARCHAR(25) DEFAULT NULL, cpte_bancaire VARCHAR(100) DEFAULT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_29F65EB18947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu_naissances (id INT AUTO_INCREMENT NOT NULL, commune_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_49F8927F131A4F72 (commune_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meres (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, profession_id INT NOT NULL, nina_id INT DEFAULT NULL, fullname VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_2D8B408AC8121CE9 (nom_id), INDEX IDX_2D8B408A58819F9E (prenom_id), INDEX IDX_2D8B408AFDEF8996 (profession_id), UNIQUE INDEX UNIQ_2D8B408A5586F33C (nina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ninas (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(15) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_51AD1AF28947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveaux (id INT AUTO_INCREMENT NOT NULL, cycle_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_56F771A08947610D (designation), INDEX IDX_56F771A05EC1162 (cycle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noms (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_A069E65D8947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peres (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, profession_id INT NOT NULL, nina_id INT DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, fullname VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_B5FB13B9C8121CE9 (nom_id), INDEX IDX_B5FB13B958819F9E (prenom_id), INDEX IDX_B5FB13B9FDEF8996 (profession_id), UNIQUE INDEX UNIQ_B5FB13B95586F33C (nina_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prenoms (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_E71162E38947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professions (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_2FDA85FA8947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redoublements1 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, INDEX IDX_2554EDA9B3E9C81 (niveau_id), INDEX IDX_2554EDA9F4C45000 (scolarite1_id), INDEX IDX_2554EDA9E671FFEE (scolarite2_id), INDEX IDX_2554EDA95ECD988B (scolarite3_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redoublements2 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, redoublement1_id INT NOT NULL, INDEX IDX_BC5DBC13B3E9C81 (niveau_id), INDEX IDX_BC5DBC13F4C45000 (scolarite1_id), INDEX IDX_BC5DBC13E671FFEE (scolarite2_id), INDEX IDX_BC5DBC135ECD988B (scolarite3_id), INDEX IDX_BC5DBC136D13ADFD (redoublement1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE redoublements3 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite2_id INT DEFAULT NULL, scolarite3_id INT DEFAULT NULL, redoublement2_id INT NOT NULL, INDEX IDX_CB5A8C85B3E9C81 (niveau_id), INDEX IDX_CB5A8C85F4C45000 (scolarite1_id), INDEX IDX_CB5A8C85E671FFEE (scolarite2_id), INDEX IDX_CB5A8C855ECD988B (scolarite3_id), INDEX IDX_CB5A8C857FA60213 (redoublement2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_A26779F38947610D (designation), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites1 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite INT DEFAULT NULL, INDEX IDX_328D2B44B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites2 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite1_id INT DEFAULT NULL, scolarite INT DEFAULT NULL, INDEX IDX_AB847AFEB3E9C81 (niveau_id), INDEX IDX_AB847AFEF4C45000 (scolarite1_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scolarites3 (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, scolarite INT NOT NULL, INDEX IDX_DC834A68B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statuts (id INT AUTO_INCREMENT NOT NULL, niveau_id INT NOT NULL, designation VARCHAR(150) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, INDEX IDX_403505E6B3E9C81 (niveau_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephones (id INT AUTO_INCREMENT NOT NULL, peres_id INT DEFAULT NULL, meres_id INT DEFAULT NULL, designation VARCHAR(15) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_6FCD09F8947610D (designation), INDEX IDX_6FCD09FE74E6A1C (peres_id), INDEX IDX_6FCD09FF04EE6 (meres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, nom_id INT NOT NULL, prenom_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, fullname VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', slug VARCHAR(128) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), INDEX IDX_1483A5E9C8121CE9 (nom_id), INDEX IDX_1483A5E958819F9E (prenom_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cercles ADD CONSTRAINT FK_45C1718D98260155 FOREIGN KEY (region_id) REFERENCES regions (id)');
        $this->addSql('ALTER TABLE classes ADD CONSTRAINT FK_2ED7EC5B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE communes ADD CONSTRAINT FK_5C5EE2A527413AB9 FOREIGN KEY (cercle_id) REFERENCES cercles (id)');
        $this->addSql('ALTER TABLE cycles ADD CONSTRAINT FK_72B88B24ABEC3B20 FOREIGN KEY (enseignement_id) REFERENCES enseignements (id)');
        $this->addSql('ALTER TABLE departements_niveaux ADD CONSTRAINT FK_5014DEFB1DB279A6 FOREIGN KEY (departements_id) REFERENCES departements (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE departements_niveaux ADD CONSTRAINT FK_5014DEFBAAC4B70E FOREIGN KEY (niveaux_id) REFERENCES niveaux (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE enseignements ADD CONSTRAINT FK_89D79280FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissements (id)');
        $this->addSql('ALTER TABLE lieu_naissances ADD CONSTRAINT FK_49F8927F131A4F72 FOREIGN KEY (commune_id) REFERENCES communes (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AC8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A58819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408AFDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE meres ADD CONSTRAINT FK_2D8B408A5586F33C FOREIGN KEY (nina_id) REFERENCES ninas (id)');
        $this->addSql('ALTER TABLE niveaux ADD CONSTRAINT FK_56F771A05EC1162 FOREIGN KEY (cycle_id) REFERENCES cycles (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B9FDEF8996 FOREIGN KEY (profession_id) REFERENCES professions (id)');
        $this->addSql('ALTER TABLE peres ADD CONSTRAINT FK_B5FB13B95586F33C FOREIGN KEY (nina_id) REFERENCES ninas (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA9E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements1 ADD CONSTRAINT FK_2554EDA95ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC13E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC135ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements2 ADD CONSTRAINT FK_BC5DBC136D13ADFD FOREIGN KEY (redoublement1_id) REFERENCES redoublements1 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85F4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C85E671FFEE FOREIGN KEY (scolarite2_id) REFERENCES scolarites2 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C855ECD988B FOREIGN KEY (scolarite3_id) REFERENCES scolarites3 (id)');
        $this->addSql('ALTER TABLE redoublements3 ADD CONSTRAINT FK_CB5A8C857FA60213 FOREIGN KEY (redoublement2_id) REFERENCES redoublements2 (id)');
        $this->addSql('ALTER TABLE scolarites1 ADD CONSTRAINT FK_328D2B44B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE scolarites2 ADD CONSTRAINT FK_AB847AFEF4C45000 FOREIGN KEY (scolarite1_id) REFERENCES scolarites1 (id)');
        $this->addSql('ALTER TABLE scolarites3 ADD CONSTRAINT FK_DC834A68B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE statuts ADD CONSTRAINT FK_403505E6B3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveaux (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09FE74E6A1C FOREIGN KEY (peres_id) REFERENCES peres (id)');
        $this->addSql('ALTER TABLE telephones ADD CONSTRAINT FK_6FCD09FF04EE6 FOREIGN KEY (meres_id) REFERENCES meres (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C8121CE9 FOREIGN KEY (nom_id) REFERENCES noms (id)');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E958819F9E FOREIGN KEY (prenom_id) REFERENCES prenoms (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cercles DROP FOREIGN KEY FK_45C1718D98260155');
        $this->addSql('ALTER TABLE classes DROP FOREIGN KEY FK_2ED7EC5B3E9C81');
        $this->addSql('ALTER TABLE communes DROP FOREIGN KEY FK_5C5EE2A527413AB9');
        $this->addSql('ALTER TABLE cycles DROP FOREIGN KEY FK_72B88B24ABEC3B20');
        $this->addSql('ALTER TABLE departements_niveaux DROP FOREIGN KEY FK_5014DEFB1DB279A6');
        $this->addSql('ALTER TABLE departements_niveaux DROP FOREIGN KEY FK_5014DEFBAAC4B70E');
        $this->addSql('ALTER TABLE enseignements DROP FOREIGN KEY FK_89D79280FF631228');
        $this->addSql('ALTER TABLE lieu_naissances DROP FOREIGN KEY FK_49F8927F131A4F72');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AC8121CE9');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A58819F9E');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408AFDEF8996');
        $this->addSql('ALTER TABLE meres DROP FOREIGN KEY FK_2D8B408A5586F33C');
        $this->addSql('ALTER TABLE niveaux DROP FOREIGN KEY FK_56F771A05EC1162');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9C8121CE9');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B958819F9E');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B9FDEF8996');
        $this->addSql('ALTER TABLE peres DROP FOREIGN KEY FK_B5FB13B95586F33C');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9B3E9C81');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9F4C45000');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA9E671FFEE');
        $this->addSql('ALTER TABLE redoublements1 DROP FOREIGN KEY FK_2554EDA95ECD988B');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13B3E9C81');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13F4C45000');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC13E671FFEE');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC135ECD988B');
        $this->addSql('ALTER TABLE redoublements2 DROP FOREIGN KEY FK_BC5DBC136D13ADFD');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85B3E9C81');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85F4C45000');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C85E671FFEE');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C855ECD988B');
        $this->addSql('ALTER TABLE redoublements3 DROP FOREIGN KEY FK_CB5A8C857FA60213');
        $this->addSql('ALTER TABLE scolarites1 DROP FOREIGN KEY FK_328D2B44B3E9C81');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEB3E9C81');
        $this->addSql('ALTER TABLE scolarites2 DROP FOREIGN KEY FK_AB847AFEF4C45000');
        $this->addSql('ALTER TABLE scolarites3 DROP FOREIGN KEY FK_DC834A68B3E9C81');
        $this->addSql('ALTER TABLE statuts DROP FOREIGN KEY FK_403505E6B3E9C81');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09FE74E6A1C');
        $this->addSql('ALTER TABLE telephones DROP FOREIGN KEY FK_6FCD09FF04EE6');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C8121CE9');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E958819F9E');
        $this->addSql('DROP TABLE cercles');
        $this->addSql('DROP TABLE classes');
        $this->addSql('DROP TABLE communes');
        $this->addSql('DROP TABLE cycles');
        $this->addSql('DROP TABLE departements');
        $this->addSql('DROP TABLE departements_niveaux');
        $this->addSql('DROP TABLE dossier_eleves');
        $this->addSql('DROP TABLE ecole_provenances');
        $this->addSql('DROP TABLE enseignements');
        $this->addSql('DROP TABLE etablissements');
        $this->addSql('DROP TABLE lieu_naissances');
        $this->addSql('DROP TABLE meres');
        $this->addSql('DROP TABLE ninas');
        $this->addSql('DROP TABLE niveaux');
        $this->addSql('DROP TABLE noms');
        $this->addSql('DROP TABLE peres');
        $this->addSql('DROP TABLE prenoms');
        $this->addSql('DROP TABLE professions');
        $this->addSql('DROP TABLE redoublements1');
        $this->addSql('DROP TABLE redoublements2');
        $this->addSql('DROP TABLE redoublements3');
        $this->addSql('DROP TABLE regions');
        $this->addSql('DROP TABLE scolarites1');
        $this->addSql('DROP TABLE scolarites2');
        $this->addSql('DROP TABLE scolarites3');
        $this->addSql('DROP TABLE statuts');
        $this->addSql('DROP TABLE telephones');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
