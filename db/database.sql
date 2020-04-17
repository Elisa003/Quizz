--Création de la base de données en ayant au préalable créer un utilisateur "quizz_user" 
-- avec le mot de passe "motdepasse" pour lui donner tous les privilèges d'accès à labase

CREATE USER 'quizz_user'@'localhost' IDENTIFIED BY 'motdepasse';

CREATE DATABASE IF NOT EXISTS QUIZZ character set utf8 collate utf8_unicode_ci;
USE QUIZZ;

GRANT ALL PRIVILEGES on QUIZZ.* to 'quizz_user'@'localhost' identified by 'motdepasse';
