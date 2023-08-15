<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230815095615 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users_garages DROP FOREIGN KEY FK_7C43442867B3B43D');
        $this->addSql('ALTER TABLE users_garages DROP FOREIGN KEY FK_7C434428FCB4E7AB');
        $this->addSql('DROP TABLE users_garages');
        $this->addSql('ALTER TABLE users ADD garage_id INT NOT NULL, CHANGE mail mail VARCHAR(180) NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9C4FFF555 FOREIGN KEY (garage_id) REFERENCES garages (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E95126AC48 ON users (mail)');
        $this->addSql('CREATE INDEX IDX_1483A5E9C4FFF555 ON users (garage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users_garages (users_id INT NOT NULL, garages_id INT NOT NULL, INDEX IDX_7C43442867B3B43D (users_id), INDEX IDX_7C434428FCB4E7AB (garages_id), PRIMARY KEY(users_id, garages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users_garages ADD CONSTRAINT FK_7C43442867B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_garages ADD CONSTRAINT FK_7C434428FCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9C4FFF555');
        $this->addSql('DROP INDEX UNIQ_1483A5E95126AC48 ON users');
        $this->addSql('DROP INDEX IDX_1483A5E9C4FFF555 ON users');
        $this->addSql('ALTER TABLE users DROP garage_id, CHANGE mail mail VARCHAR(255) NOT NULL');
    }
}
