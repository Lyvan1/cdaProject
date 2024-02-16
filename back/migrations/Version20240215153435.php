<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215153435 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE children_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE classroom_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE private_teacher_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE professor_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE student_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tutor_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE children (id INT NOT NULL, tutor_id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(45) NOT NULL, lastname VARCHAR(45) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, birthdate DATE NOT NULL, level VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A197B1BAF85E0677 ON children (username)');
        $this->addSql('CREATE INDEX IDX_A197B1BA208F64F1 ON children (tutor_id)');
        $this->addSql('COMMENT ON COLUMN children.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE classroom (id INT NOT NULL, professor_id INT NOT NULL, level VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_497D309D7D2D84D5 ON classroom (professor_id)');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, pdf_path VARCHAR(255) NOT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN course.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE game (id INT NOT NULL, course_id INT NOT NULL, title VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, rules VARCHAR(255) NOT NULL, type VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_232B318C591CC992 ON game (course_id)');
        $this->addSql('CREATE TABLE game_notation (student_id INT NOT NULL, game_id INT NOT NULL, notation INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(student_id, game_id))');
        $this->addSql('CREATE INDEX IDX_A92C43B3CB944F1A ON game_notation (student_id)');
        $this->addSql('CREATE INDEX IDX_A92C43B3E48FD905 ON game_notation (game_id)');
        $this->addSql('COMMENT ON COLUMN game_notation.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN game_notation.updated_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE private_teacher (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(45) NOT NULL, lastname VARCHAR(45) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, birthdate DATE NOT NULL, email VARCHAR(255) NOT NULL, phone_number INT NOT NULL, subject VARCHAR(30) NOT NULL, siret VARCHAR(50) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_410F6A31F85E0677 ON private_teacher (username)');
        $this->addSql('COMMENT ON COLUMN private_teacher.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE professor (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(45) NOT NULL, lastname VARCHAR(45) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, birthdate DATE NOT NULL, numen VARCHAR(13) NOT NULL, phone_number INT NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_790DD7E3F85E0677 ON professor (username)');
        $this->addSql('COMMENT ON COLUMN professor.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE student (id INT NOT NULL, classroom_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(45) NOT NULL, lastname VARCHAR(45) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, birthdate DATE NOT NULL, email VARCHAR(100) DEFAULT NULL, phone_number INT DEFAULT NULL, level VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF33F85E0677 ON student (username)');
        $this->addSql('CREATE INDEX IDX_B723AF336278D5A8 ON student (classroom_id)');
        $this->addSql('COMMENT ON COLUMN student.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE TABLE tutor (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(45) NOT NULL, lastname VARCHAR(45) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, birthdate DATE NOT NULL, phone_number INT NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_99074648F85E0677 ON tutor (username)');
        $this->addSql('COMMENT ON COLUMN tutor.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE children ADD CONSTRAINT FK_A197B1BA208F64F1 FOREIGN KEY (tutor_id) REFERENCES tutor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classroom ADD CONSTRAINT FK_497D309D7D2D84D5 FOREIGN KEY (professor_id) REFERENCES professor (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_notation ADD CONSTRAINT FK_A92C43B3CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_notation ADD CONSTRAINT FK_A92C43B3E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF336278D5A8 FOREIGN KEY (classroom_id) REFERENCES classroom (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE children_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE classroom_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE private_teacher_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE professor_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE student_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tutor_id_seq CASCADE');
        $this->addSql('ALTER TABLE children DROP CONSTRAINT FK_A197B1BA208F64F1');
        $this->addSql('ALTER TABLE classroom DROP CONSTRAINT FK_497D309D7D2D84D5');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318C591CC992');
        $this->addSql('ALTER TABLE game_notation DROP CONSTRAINT FK_A92C43B3CB944F1A');
        $this->addSql('ALTER TABLE game_notation DROP CONSTRAINT FK_A92C43B3E48FD905');
        $this->addSql('ALTER TABLE student DROP CONSTRAINT FK_B723AF336278D5A8');
        $this->addSql('DROP TABLE children');
        $this->addSql('DROP TABLE classroom');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE game_notation');
        $this->addSql('DROP TABLE private_teacher');
        $this->addSql('DROP TABLE professor');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE tutor');
    }
}
