DROP TABLE if exists THEME;
DROP TABLE if exists QUESTION;
DROP TABLE if exists UTILISATEUR;
DROP TABLE if exists DIFFICULTE;
DROP TABLE if exists GAGNE;

CREATE TABLE THEME( 
id_theme INTEGER NOT NULL PRIMARY KEY auto_increment, 
libelle VARCHAR(100) NOT NULL, 
nb_questions INTEGER NOT NULL, 
images VARCHAR(100)
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE QUESTION( 
id_question INTEGER NOT NULL auto_increment, 
id_theme INTEGER  NOT NULL,
type VARCHAR(50) NOT NULL, 
question VARCHAR(200) NOT NULL,
reponse_vraie VARCHAR(200) NOT NULL,
reponse_fausse1 VARCHAR(200),
reponse_fausse2 VARCHAR(200),
reponse_fausse3 VARCHAR(200),
PRIMARY KEY (id_question, id_theme),
FOREIGN KEY (id_theme) REFERENCES THEME(id_theme)
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE UTILISATEUR( 
id_utilisateur INTEGER NOT NULL PRIMARY KEY auto_increment,
login VARCHAR(50) NOT NULL, 
mdp VARCHAR(50) NOT NULL, 
droits VARCHAR(50) NOT NULL
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE DIFFICULTE( 
id_difficulte INTEGER NOT NULL PRIMARY KEY auto_increment,
libelle VARCHAR(100) NOT NULL,
nb_questions INTEGER NOT NULL
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE GAGNE( 
points INTEGER, 
temps INTEGER,
id_utilisateur INTEGER NOT NULL,
id_theme INTEGER NOT NULL,
id_difficulte INTEGER NOT NULL,
FOREIGN KEY (id_utilisateur) REFERENCES UTILISATEUR (id_utilisateur),
FOREIGN KEY (id_theme) REFERENCES THEME(id_theme),
FOREIGN KEY (id_difficulte) REFERENCES DIFFICULTE(id_difficulte),
PRIMARY KEY (id_utilisateur,id_theme,id_difficulte)
) engine=innodb character set utf8 collate utf8_unicode_ci;
