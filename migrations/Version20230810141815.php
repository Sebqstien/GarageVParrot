<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230810141815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ads (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7EC9F620C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cars (id INT AUTO_INCREMENT NOT NULL, ad_id INT NOT NULL, model VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, energy VARCHAR(255) NOT NULL, kilometers VARCHAR(30) NOT NULL, year INT NOT NULL, UNIQUE INDEX UNIQ_95C71D144F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE garages (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, phone VARCHAR(10) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, ad_id INT NOT NULL, service_id INT NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6A4F34D596 (ad_id), INDEX IDX_E01FBE6AED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedules (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, opened_days VARCHAR(30) NOT NULL, hours_pm VARCHAR(100) NOT NULL, hours_am VARCHAR(100) NOT NULL, INDEX IDX_313BDC8EC4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_7332E169C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testimonials (id INT AUTO_INCREMENT NOT NULL, garage_id INT NOT NULL, author VARCHAR(100) NOT NULL, message LONGTEXT NOT NULL, note INT NOT NULL, validated TINYINT(1) NOT NULL, INDEX IDX_38311579C4FFF555 (garage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(60) NOT NULL, lastname VARCHAR(60) NOT NULL, mail VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_garages (users_id INT NOT NULL, garages_id INT NOT NULL, INDEX IDX_7C43442867B3B43D (users_id), INDEX IDX_7C434428FCB4E7AB (garages_id), PRIMARY KEY(users_id, garages_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ads ADD CONSTRAINT FK_7EC9F620C4FFF555 FOREIGN KEY (garage_id) REFERENCES garages (id)');
        $this->addSql('ALTER TABLE cars ADD CONSTRAINT FK_95C71D144F34D596 FOREIGN KEY (ad_id) REFERENCES ads (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6A4F34D596 FOREIGN KEY (ad_id) REFERENCES ads (id)');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AED5CA9E6 FOREIGN KEY (service_id) REFERENCES services (id)');
        $this->addSql('ALTER TABLE schedules ADD CONSTRAINT FK_313BDC8EC4FFF555 FOREIGN KEY (garage_id) REFERENCES garages (id)');
        $this->addSql('ALTER TABLE services ADD CONSTRAINT FK_7332E169C4FFF555 FOREIGN KEY (garage_id) REFERENCES garages (id)');
        $this->addSql('ALTER TABLE testimonials ADD CONSTRAINT FK_38311579C4FFF555 FOREIGN KEY (garage_id) REFERENCES garages (id)');
        $this->addSql('ALTER TABLE users_garages ADD CONSTRAINT FK_7C43442867B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_garages ADD CONSTRAINT FK_7C434428FCB4E7AB FOREIGN KEY (garages_id) REFERENCES garages (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ads DROP FOREIGN KEY FK_7EC9F620C4FFF555');
        $this->addSql('ALTER TABLE cars DROP FOREIGN KEY FK_95C71D144F34D596');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6A4F34D596');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AED5CA9E6');
        $this->addSql('ALTER TABLE schedules DROP FOREIGN KEY FK_313BDC8EC4FFF555');
        $this->addSql('ALTER TABLE services DROP FOREIGN KEY FK_7332E169C4FFF555');
        $this->addSql('ALTER TABLE testimonials DROP FOREIGN KEY FK_38311579C4FFF555');
        $this->addSql('ALTER TABLE users_garages DROP FOREIGN KEY FK_7C43442867B3B43D');
        $this->addSql('ALTER TABLE users_garages DROP FOREIGN KEY FK_7C434428FCB4E7AB');
        $this->addSql('DROP TABLE ads');
        $this->addSql('DROP TABLE cars');
        $this->addSql('DROP TABLE garages');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE schedules');
        $this->addSql('DROP TABLE services');
        $this->addSql('DROP TABLE testimonials');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_garages');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
