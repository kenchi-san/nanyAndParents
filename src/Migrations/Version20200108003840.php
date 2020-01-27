<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108003840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nanny (id INT AUTO_INCREMENT NOT NULL, id_parents_id INT DEFAULT NULL, id_from_nany_id INT DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, day_price DOUBLE PRECISION DEFAULT NULL, meal_price DOUBLE PRECISION DEFAULT NULL, snack_price DOUBLE PRECISION DEFAULT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_F354C7CC128C3604 (id_parents_id), INDEX IDX_F354C7CC89E798FC (id_from_nany_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE nanny ADD CONSTRAINT FK_F354C7CC128C3604 FOREIGN KEY (id_parents_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE nanny ADD CONSTRAINT FK_F354C7CC89E798FC FOREIGN KEY (id_from_nany_id) REFERENCES message (id)');
        $this->addSql('DROP TABLE nany');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nany (id INT AUTO_INCREMENT NOT NULL, id_parents_id INT DEFAULT NULL, id_from_nany_id INT DEFAULT NULL, firstname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, day_price DOUBLE PRECISION DEFAULT NULL, meal_price DOUBLE PRECISION DEFAULT NULL, snack_price DOUBLE PRECISION DEFAULT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, phone_number VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, picture VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_610F718A89E798FC (id_from_nany_id), UNIQUE INDEX UNIQ_610F718A128C3604 (id_parents_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE nany ADD CONSTRAINT FK_610F718A128C3604 FOREIGN KEY (id_parents_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE nany ADD CONSTRAINT FK_610F718A89E798FC FOREIGN KEY (id_from_nany_id) REFERENCES message (id)');
        $this->addSql('DROP TABLE nanny');
    }
}
