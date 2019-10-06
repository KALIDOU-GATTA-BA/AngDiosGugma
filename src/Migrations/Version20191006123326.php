<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191006123326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE student_add ADD status VARCHAR(255) NOT NULL, ADD address VARCHAR(255) NOT NULL, ADD age INT NOT NULL, ADD representative VARCHAR(255) NOT NULL, ADD adgworker_or_indigent VARCHAR(255) DEFAULT NULL, DROP level, DROP city');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE student_add ADD level VARCHAR(20) NOT NULL COLLATE utf8mb4_unicode_ci, ADD city VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, DROP status, DROP address, DROP age, DROP representative, DROP adgworker_or_indigent');
    }
}
