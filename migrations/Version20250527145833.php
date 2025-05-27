<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250527145833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE set ADD description TEXT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE set DROP repeat
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout ADD weight INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout ADD repeats INT NOT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout DROP weight
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE workout DROP repeats
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE set ADD repeat INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE set DROP description
        SQL);
    }
}
