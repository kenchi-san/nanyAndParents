<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200108005206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE nanny DROP FOREIGN KEY FK_F354C7CC128C3604');
        $this->addSql('ALTER TABLE nanny DROP FOREIGN KEY FK_F354C7CC89E798FC');
        $this->addSql('DROP INDEX IDX_F354C7CC89E798FC ON nanny');
        $this->addSql('DROP INDEX UNIQ_F354C7CC128C3604 ON nanny');
        $this->addSql('ALTER TABLE nanny ADD id_parent_id INT DEFAULT NULL, ADD id_from_nanny_id INT DEFAULT NULL, DROP id_parents_id, DROP id_from_nany_id');
        $this->addSql('ALTER TABLE nanny ADD CONSTRAINT FK_F354C7CCF24F7657 FOREIGN KEY (id_parent_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE nanny ADD CONSTRAINT FK_F354C7CCEE8E4F7C FOREIGN KEY (id_from_nanny_id) REFERENCES message (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F354C7CCF24F7657 ON nanny (id_parent_id)');
        $this->addSql('CREATE INDEX IDX_F354C7CCEE8E4F7C ON nanny (id_from_nanny_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE nanny DROP FOREIGN KEY FK_F354C7CCF24F7657');
        $this->addSql('ALTER TABLE nanny DROP FOREIGN KEY FK_F354C7CCEE8E4F7C');
        $this->addSql('DROP INDEX UNIQ_F354C7CCF24F7657 ON nanny');
        $this->addSql('DROP INDEX IDX_F354C7CCEE8E4F7C ON nanny');
        $this->addSql('ALTER TABLE nanny ADD id_parents_id INT DEFAULT NULL, ADD id_from_nany_id INT DEFAULT NULL, DROP id_parent_id, DROP id_from_nanny_id');
        $this->addSql('ALTER TABLE nanny ADD CONSTRAINT FK_F354C7CC128C3604 FOREIGN KEY (id_parents_id) REFERENCES parents (id)');
        $this->addSql('ALTER TABLE nanny ADD CONSTRAINT FK_F354C7CC89E798FC FOREIGN KEY (id_from_nany_id) REFERENCES message (id)');
        $this->addSql('CREATE INDEX IDX_F354C7CC89E798FC ON nanny (id_from_nany_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F354C7CC128C3604 ON nanny (id_parents_id)');
    }
}
