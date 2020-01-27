<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200107001000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message ADD id_parents_id INT NOT NULL');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F128C3604 FOREIGN KEY (id_parents_id) REFERENCES parents (id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F128C3604 ON message (id_parents_id)');
        $this->addSql('ALTER TABLE nany ADD id_from_nany_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nany ADD CONSTRAINT FK_610F718A89E798FC FOREIGN KEY (id_from_nany_id) REFERENCES message (id)');
        $this->addSql('CREATE INDEX IDX_610F718A89E798FC ON nany (id_from_nany_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F128C3604');
        $this->addSql('DROP INDEX IDX_B6BD307F128C3604 ON message');
        $this->addSql('ALTER TABLE message DROP id_parents_id');
        $this->addSql('ALTER TABLE nany DROP FOREIGN KEY FK_610F718A89E798FC');
        $this->addSql('DROP INDEX IDX_610F718A89E798FC ON nany');
        $this->addSql('ALTER TABLE nany DROP id_from_nany_id');
    }
}
