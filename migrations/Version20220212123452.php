<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212123452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP INDEX service_name ON log');
        $this->addSql('DROP INDEX start_date ON log');
        $this->addSql('DROP INDEX filename ON log');
        $this->addSql('ALTER TABLE log DROP filename, DROP service_name, DROP start_date, DROP http_method, DROP path, DROP status_code, DROP http_protocol, DROP line_number, CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE log ADD filename VARCHAR(128) NOT NULL COLLATE `utf8mb4_general_ci`, ADD service_name VARCHAR(16) NOT NULL COLLATE `utf8mb4_general_ci`, ADD start_date BIGINT NOT NULL, ADD http_method VARCHAR(8) NOT NULL COLLATE `utf8mb4_general_ci`, ADD path VARCHAR(128) NOT NULL COLLATE `utf8mb4_general_ci`, ADD status_code SMALLINT NOT NULL, ADD http_protocol VARCHAR(16) NOT NULL COLLATE `utf8mb4_general_ci`, ADD line_number INT NOT NULL, CHANGE id id BIGINT AUTO_INCREMENT NOT NULL');
        $this->addSql('CREATE INDEX service_name ON log (service_name)');
        $this->addSql('CREATE INDEX start_date ON log (start_date)');
        $this->addSql('CREATE INDEX filename ON log (filename)');
    }
}
