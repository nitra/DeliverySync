<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
    Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20130131125747 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("CREATE TABLE delivery_period (id INT AUTO_INCREMENT NOT NULL, delivery_service_id INT DEFAULT NULL, city_from_id INT DEFAULT NULL, city_to_id INT DEFAULT NULL, delivery_city_from_id INT DEFAULT NULL, delivery_city_to_id INT DEFAULT NULL, department_from_id INT DEFAULT NULL, department_to_id INT DEFAULT NULL, period INT NOT NULL, INDEX IDX_DBA9E740F3193EC2 (delivery_service_id), INDEX IDX_DBA9E740C5866759 (city_from_id), INDEX IDX_DBA9E74073BFED32 (city_to_id), INDEX IDX_DBA9E7405A059E5D (delivery_city_from_id), INDEX IDX_DBA9E7406DFA7A16 (delivery_city_to_id), INDEX IDX_DBA9E740C56731E8 (department_from_id), INDEX IDX_DBA9E7402B96F579 (department_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E740F3193EC2 FOREIGN KEY (delivery_service_id) REFERENCES delivery_service (id)");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E740C5866759 FOREIGN KEY (city_from_id) REFERENCES geo_city (id)");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E74073BFED32 FOREIGN KEY (city_to_id) REFERENCES geo_city (id)");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E7405A059E5D FOREIGN KEY (delivery_city_from_id) REFERENCES delivery_city (id)");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E7406DFA7A16 FOREIGN KEY (delivery_city_to_id) REFERENCES delivery_city (id)");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E740C56731E8 FOREIGN KEY (department_from_id) REFERENCES department (id)");
        $this->addSql("ALTER TABLE delivery_period ADD CONSTRAINT FK_DBA9E7402B96F579 FOREIGN KEY (department_to_id) REFERENCES department (id)");
    }

    public function down(Schema $schema)
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
        
        $this->addSql("DROP TABLE delivery_period");
    }
}