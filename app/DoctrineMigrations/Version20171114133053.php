<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Migrations\MigrationException;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171114133053 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE trip_measures (id INT AUTO_INCREMENT NOT NULL, trip_id INT DEFAULT NULL, distance DOUBLE PRECISION NOT NULL, INDEX IDX_F8DB2F45A5BC2E0E (trip_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trips (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, measure_interval INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trip_measures ADD CONSTRAINT FK_F8DB2F45A5BC2E0E FOREIGN KEY (trip_id) REFERENCES trips (id)');
    }

    /**
     * @param Schema $schema
     * @throws MigrationException
     */
    public function down(Schema $schema)
    {
        throw new MigrationException("You cannot down migration.");
    }
}
