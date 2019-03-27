<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190327165654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1466E42BF');
        $this->addSql('DROP INDEX IDX_CFBDFA1466E42BF ON note');
        $this->addSql('ALTER TABLE note CHANGE box_id_id board_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14DDF9797C FOREIGN KEY (board_id_id) REFERENCES board (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14DDF9797C ON note (board_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14DDF9797C');
        $this->addSql('DROP INDEX IDX_CFBDFA14DDF9797C ON note');
        $this->addSql('ALTER TABLE note CHANGE board_id_id box_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1466E42BF FOREIGN KEY (box_id_id) REFERENCES board (id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA1466E42BF ON note (box_id_id)');
    }
}
