<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260115155533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proyecto_usuario (id INT AUTO_INCREMENT NOT NULL, tarifa DOUBLE PRECISION NOT NULL, usuario_id INT NOT NULL, proyecto_id INT NOT NULL, INDEX IDX_4C9FD03DDB38439E (usuario_id), INDEX IDX_4C9FD03DF625D1BA (proyecto_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE proyecto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE tarea (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(200) NOT NULL, descripcion LONGTEXT NOT NULL, proyecto_id INT NOT NULL, INDEX IDX_3CA05366F625D1BA (proyecto_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(50) NOT NULL, apellido VARCHAR(50) NOT NULL, email VARCHAR(200) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE proyecto_usuario ADD CONSTRAINT FK_4C9FD03DDB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
        $this->addSql('ALTER TABLE proyecto_usuario ADD CONSTRAINT FK_4C9FD03DF625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
        $this->addSql('ALTER TABLE tarea ADD CONSTRAINT FK_3CA05366F625D1BA FOREIGN KEY (proyecto_id) REFERENCES proyecto (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proyecto_usuario DROP FOREIGN KEY FK_4C9FD03DDB38439E');
        $this->addSql('ALTER TABLE proyecto_usuario DROP FOREIGN KEY FK_4C9FD03DF625D1BA');
        $this->addSql('ALTER TABLE tarea DROP FOREIGN KEY FK_3CA05366F625D1BA');
        $this->addSql('DROP TABLE proyecto_usuario');
        $this->addSql('DROP TABLE proyecto');
        $this->addSql('DROP TABLE tarea');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
