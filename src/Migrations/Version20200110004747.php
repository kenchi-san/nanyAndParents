<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200110004747 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE baby ADD id_nanny_id INT DEFAULT NULL, ADD id_parents_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE baby ADD CONSTRAINT FK_876C813E46929216 FOREIGN KEY (id_nanny_id) REFERENCES nanny (id)');
        $this->addSql('ALTER TABLE baby ADD CONSTRAINT FK_876C813E128C3604 FOREIGN KEY (id_parents_id) REFERENCES parents (id)');
        $this->addSql('CREATE INDEX IDX_876C813E46929216 ON baby (id_nanny_id)');
        $this->addSql('CREATE INDEX IDX_876C813E128C3604 ON baby (id_parents_id)');
        $this->addSql('ALTER TABLE message ADD id_message_nanny_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FFCE5EF43 FOREIGN KEY (id_message_nanny_id) REFERENCES nanny (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307FFCE5EF43 ON message (id_message_nanny_id)');
        $this->addSql('ALTER TABLE parents ADD id_nanny_id INT DEFAULT NULL, ADD id_message_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6A46929216 FOREIGN KEY (id_nanny_id) REFERENCES nanny (id)');
        $this->addSql('ALTER TABLE parents ADD CONSTRAINT FK_FD501D6AF6F093FE FOREIGN KEY (id_message_id) REFERENCES message (id)');
        $this->addSql('CREATE INDEX IDX_FD501D6A46929216 ON parents (id_nanny_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FD501D6AF6F093FE ON parents (id_message_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE baby DROP FOREIGN KEY FK_876C813E46929216');
        $this->addSql('ALTER TABLE baby DROP FOREIGN KEY FK_876C813E128C3604');
        $this->addSql('DROP INDEX IDX_876C813E46929216 ON baby');
        $this->addSql('DROP INDEX IDX_876C813E128C3604 ON baby');
        $this->addSql('ALTER TABLE baby DROP id_nanny_id, DROP id_parents_id');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307FFCE5EF43');
        $this->addSql('DROP INDEX IDX_B6BD307FFCE5EF43 ON message');
        $this->addSql('ALTER TABLE message DROP id_message_nanny_id');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6A46929216');
        $this->addSql('ALTER TABLE parents DROP FOREIGN KEY FK_FD501D6AF6F093FE');
        $this->addSql('DROP INDEX IDX_FD501D6A46929216 ON parents');
        $this->addSql('DROP INDEX UNIQ_FD501D6AF6F093FE ON parents');
        $this->addSql('ALTER TABLE parents DROP id_nanny_id, DROP id_message_id');
    }
}
