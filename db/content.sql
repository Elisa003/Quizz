--Insertion des thèmes dans la table THEME
--id_theme, libelle, nb_questions
INSERT INTO THEME VALUES 
(1, 'Star Wars', 24), 
(2, 'Harry Potter', 29),
(3, 'Cuisine', 22),
(4, 'Géographie', 26);

--Insertion des questions dans la table QUESTION
--id_question, id_theme, type, libelle, reponse_vraie, reponse_fausse1, reponse_fausse2, reponse_fausse3
INSERT INTO QUESTION VALUES 
    #star wars
    (1, 1, 'qcm', 'De quelle planète vient Anakin Skywalker ?', 'Tatooine', 'Endor', 'Hoth', 'Jakku'),
    (2, 1, 'qcm', "Comment s'appelle le fils d'Anakin Skywalker ?", 'Luke', 'Han', 'R2-D2', 'Jabba'),
    (3, 1, 'qcm', 'Quel sith Anakin Skywalker devient il ?', 'Dark Vador', 'Dark Maul', 'Dark Sith', 'Dark Palpatine'),
    (4, 1, 'qcm', "L'épisode 2 s'appelle : La guerre des ... ?", 'Clones', 'Stormtroopers', 'Droides', 'Sith'),
    (5, 1, 'qcm', "Comment s'appelle la soeur de Luke ?", 'Leïa', 'Rey', 'Mon Mothma', "il n'a pas de soeur"),
    (6, 1, 'qcm', "Comment s'appelle la procédure militaire qui retourne les clones contre les Jedis ?", '66', '67', '44', '80'),
    (7, 1, 'qcm', "Comment s'appelle le planète où tous les clones sont nés ?", 'Kamino', 'Geonosis', 'Mars', 'Courscant'),
    (8, 1, 'qcm', "Comment s'appelle le chasseur de primes qui porte une armure bleue et qui s'est battu contre Obi Wan Kenobi sur Kamino ?", 'Jango Fett', 'Dark Vador', 'Boba Fett', 'aucun des précédents'),
    (9, 1, 'qcm', "Qui était le maître d'Obi Wan Kenobi ?", 'Qui Gon Jinn', 'Yoda', 'Anakin Skywalker', "il n'a pas eu de maître"),
    (10, 1, 'qcm', 'Les stormtroopers basiques portent une armure de quelle couleur ?', 'Blanche', 'Bleue', 'Verte', 'Noires'),
    (11, 1, 'qcm', "Quel est le nom de sith de Palpatine ?", 'Dark Sidious', 'Dark Vador', 'Dark Maul', 'Dark Tyranus'),
    (12, 1, 'qcm', "Comment s'appelle la mère d'Anakin Skywalker ?", 'Shmi', 'Rey', 'Leïa', 'Padmé'),
    (13, 1, 'qcm', "Comment s'appelle la femme d'Anakin Skywalker ?", 'Padmé', 'Rey', 'Leïa', 'Shmi'),
    (14, 1, 'qcm', "Dans la saga, Luke Skywalker et la princesse Leïa sont :", 'Frère et soeur', 'En couple', 'Père et fille', 'Mère et fils'),
    (15, 1, 'qcm', "Sur quelle planète Luke Skywalker rencontre-t-il Yoda pour la première fois ?", 'Dagobah', 'Coruscant', 'Yavin IV', 'Hoth'),
    (16, 1, 'qcm', "Quel acteur joue le rôle de Mace Windu ?", 'Samuel L. Jackson', 'Harrison Ford', 'Laurence Fishburne', 'Mark Hamill'),
    (17, 1, 'ouverte', "Dans l'Empire contre-attaque, sur quelle planète l'Alliance Rebelle a t-elle établie sa base ?", 'Hoth', '', '', ''),
    (18, 1, 'qcm', "Grâce à quoi les sabres lasers fonctionnent-ils ?", 'Un cristal', 'Un diamant', 'La Force', 'Un morceau de Kryptonite'),
    (19, 1, 'qcm', "Quel est le célèbre vaisseau chasseur de l'Alliance Rebelle ?", 'Le X-Wing', 'Le F-Wing', 'Le A-Wing', 'Le R-Wing'),
    (20, 1, 'qcm', "De quel groupe dépend l'Armée des droïdes ?", 'La Fédération du Commerce', 'La République', "L'Empire", "L'Alliance Rebelle"),
    (21, 1, 'qcm', "Quel est le vaisseau mythique piloté par Han Solo ?", 'Le Faucon millénium', "L'Aigle millénium", 'Le Corbeau millénium', 'La Buse millénium'),
    (22, 1, 'qcm', "Le personnage de Jar Jar Binks appartient à l'espèce des :", 'Gungans', 'Wookiees', 'Ewoks', 'Droïdes'),
    (23, 1, 'qcm', "Qui est le premier propriétaire du Faucon Millénium ?", 'Landon Calrissian', 'Jabba le Hutt', 'Han Solo', 'Anakin Skywalker'),
    (24, 1, 'qcm', "Quelle est la planète d'origine de Chewbacca ?", 'Kashyyyk', 'Tatooine', 'Naboo', 'Hoth'),
    #Harry Potter
    (1, 2, 'qcm', "Quel est l'emblème de la maison Gryffondor ?", 'Un Lion', 'Un Gryffon', 'Un Loup', 'Un Dragon'),
    (2, 2, 'qcm', "Quel est l'emblème de la maison Serpentard ?", 'Un Serpent', 'Une Grenouille', 'Un Lézard', 'Une Arraignée'),
    (3, 2, 'qcm', "Quel est l'emblème de la maison Serdaigle ?", 'Un Corbeau', 'Un Aigle', 'Un Faucon', 'Une Buse'),
    (4, 2, 'qcm', "Quel est l'emblème de la maison Poufsouffle ?", 'Un Blaireau', 'Un Raton', 'Une Fouine', 'Un Surricate'),
    (5, 2, 'qcm', "Dans Harry Potter 1, quel animal voit-on au début et qui est en réalité une femme ?", 'Un Chat', 'Une Souris', 'Un Tigre', 'Un hibou'),
    (6, 2, 'qcm', "Comment s'appelle la famille de Harry ?", 'Dursley', 'Dudley', 'Durslai', 'Durley'),
    (7, 2, 'qcm', "Où dort Harry dans le premier film ?", "Dans un placard sous l'escalier", 'Dans le salon', 'Avec son cousin', 'Dans une tente'),
    (8, 2, 'qcm', "Où fait-il la rencontre de Ron ?", 'Dans le train', 'Sur le chemin de Traverse', 'Chez M. Ollivander', "A l'école"),
    (9, 2, 'qcm', "Que lui propose Drago Malefoy quand ils sont à l'école ?", 'De devenir ami avec lui', 'De devenir ami avec Ron', 'De ne pas lui parler', "S'il est vraiment Harry Potter"),
    (10, 2, 'qcm', "Qui envoie un cognard à la poursuite de Harry ?", 'Dobby', 'Rogue', 'Quirel', 'Malefoy'),
    (11, 2, 'qcm', "Qui est l'auteur de Harry Potter ?", 'J. K. Rowling', 'J. R. R. Tolkien', 'J. M. Rowling', 'J. R. T. Tolkien'),
    (12, 2, 'qcm', "Comment s'appelle le magasin de magie noire sur l'allée des embrumes ?", 'Barjow & Beurk', 'Beurk & Barjo', 'Barjo & Beurk', 'Beurk & Barjow'),
    (13, 2, 'qcm', "Qui est le chevalier du Catogan ?", 'Une peinture qui bouge', 'Une sculpture', "Un surnom donné à un professeur de l'école", 'Un ennemi de Harry'),
    (14, 2, 'qcm', "Comment s'appelle l'hypogriffe dans Harry Potter 3 ?", 'Buck', 'Ventdebout', 'Buct', 'Trow'),
    (15, 2, 'qcm', "Avec quoi a été fabriquée la baguette de Harry ?", 'Bois de houx et plume de phoenix', "Bois d'if et plume de phoenix", 'Bois de sureau et plume de phoenix', 'Bois de cerisier et plume de phoenix'),
    (16, 2, 'qcm', "Qui sont les rafleurs ?", 'Des sorciers qui travaillent pour le ministère de la magie', 'Des sorciers qui travaillent pour les Mangemorts', 'Des sorciers qui raflent tout sur leur passages', 'Des créatures poilues'),
    (17, 2, 'qcm', "Combien Harry a-t-il payé sa baguette ?", '7 gallions', '5 gallions', '9 gallions', '8 gallions'),
    (18, 2, 'qcm', "Quand a été fabriqué le choixpeau magique ?", "A l'époque des fondateurs", 'Quand Dumbledore est arrivé', 'Quand on a su que Harry avait survécu à Voldemort', "C'est Hermione qui l'a conçu pour l'école"),
    (19, 2, 'qcm', "La mort a donné la cape d'invisibilité à un des trois frères, mais lequel ?", 'Ignotus Peverell', 'Antioch Peverell', 'Cadmus Peverell', 'Valius Peverell'),
    (20, 2, 'qcm', "Combien de cartes de Chocogrenouille Ron possède-t-il ?", '500', '50', '1000', '200'),
    (21, 2, 'qcm', "Où Harry a-t-il rencontré Dedalus Diggle pour la première fois ?", 'Au supermarché', "A l'école", 'Chez lui', 'Au Chaudron Baveur'),
    (22, 2, 'qcm', "Qu'est-ce que l'amortentia ?", "Un très puissant filtre d'amour", 'De la nourriture anglaise', 'Une potion qui fait des bulles roses', 'Un très puissant poison'),
    (23, 2, 'qcm', "Que relève Slughorn sur Aragog ?", 'Son venin', 'Ses pinces', 'Ses yeux', 'Ses poils'),
    (24, 2, 'qcm', "Qui est le realisateur du 5ème film ?", 'David Yates', 'Chris Colombus', 'Gore Verbinski', 'Clint Eastwood'),
    (25, 2, 'qcm', "Comment s'appelle l'orphelinat où Tom Jedusor a grandi ?", "L'orphelinat de Laine", "L'orphelinat du Caire", "L'orphelinat vert", "L'orphelinat Fond de l'étang"),
    (26, 2, 'qcm', "Quel est le troisième prénom de Dumbledore ?", 'Wulfric', 'Brian', 'Albus', 'Perceval'),
    (27, 2, 'qcm', "Qui sont les langues de plombs ?", 'Des sorciers qui travaillent au département des mystères', 'Des sorciers qui travaillent le plomb', 'Des sorciers qui travaillent au département des créatures magiques', 'Des objets ensorcelés'),
    (28, 2, 'qcm', "Que fait l'épouvantard ?", 'Il prend la forme de ce qui nous fait peur', 'Il nous tue', 'Il aspire notre bonheur', 'Il ne fait rien car on ne le voit pas'),
    (29, 2, 'qcm', "Que signifie ASPIC ?", 'Accumulation de Sorcellerie Particulièrement Intensive et Contraignante', 'Aspiration de Sorcellerie Prematurement Inoffensive et Contraignante', 'Assortiment de Sorciers  Pour un Intensif Concours', 'Ca ne veut rien dire'),
    #cuisine
    (1, 3, 'vrai_faux', "Le ttoro, soupe de poissons, est une spécialité bretonne.", 'Faux', '', '', ''),
    (2, 3, 'vrai_faux', "Le Paris-Brest est une pâtisserie composée d'une pâte à choux fourrée d'une crème au café.", 'Faux', '', '', ''),
    (3, 3, 'vrai_faux', "Les trois ingrédients qui suffisent à préparer l'authentique truffade, sont les pommes de terre, le fromage et l'ail (sans oublier sel et poivre, bien sûr).", 'Vrai', '', '', ''),
    (4, 3, 'vrai_faux', "La meurette, sauce au vin rouge cuisinée avec des lardons, des oignons, des champignons, est typiquement bordelaise.", 'Faux', '', '', ''),
    (5, 3, 'vrai_faux', "On appelle 'cervelle de canut', du fromage blanc en faisselle assaisonné avec ciboulette, persil et échalote hachés, huile d'olive, sel et poivre.", 'Vrai', '', '', ''),
    (6, 3, 'vrai_faux', "La garbure béarnaise ne contient pas de confit de canard.", 'Vrai', '', '', ''),
    (7, 3, 'vrai_faux', "La sauce Nantua est élaborée à partir d'une béchamel et de beurre de langoustine.", 'Faux', '', '', ''),
    (8, 3, 'vrai_faux', "La bourride à la sétoise est un ragoût composé de poissons blancs dont la lotte (queue de baudroie) et accompagné d'aïoli.", 'Vrai', '', '', ''),
    (9, 3, 'vrai_faux', "Vacherin ! Ce nom désigne à la fois plusieurs sortes de fromages et un gâteau.", 'Vrai', '', '', ''),
    (10, 3, 'vrai_faux', "On appelle 'koulak' un pâté en croûte d'origine russe, farci de poisson ou de viande, d'oeufs durs et de légumes.", 'Faux', '', '', ''),
    (11, 3, 'vrai_faux', "Dans le commerce, les oeufs marqués '0' sont les oeufs de poules élévées en plein air et nourries avec une alimentation biologique.", 'Vrai', '', '', ''),
    (12, 3, 'qcm', "De quel pays viennent les moules frites ?", 'Belgique', 'Espagne', 'Hollande', 'Italie'),
    (13, 3, 'qcm', "On vous sert un poulet Tandoori. Dans quel restaurant êtes-vous ?", 'Restaurant indien', 'Restaurant japonais', 'Au Tex Mex', 'Restaurant chinois'),
    (14, 3, 'qcm', "On nous présente une soupe nommée 'harira', où sommes-nous ?", 'Au Maroc', 'En Tunisie', 'Au Liban', 'En Arabie'),
    (15, 3, 'qcm', "Dans quel restaurant trouvons-nous des sushis ?", 'Japonais', 'Chinois', 'Grec', 'Thaïlandais'),
    (16, 3, 'qcm', "D'où viennent les beignets farcis à la morue ?", 'Des Antilles', 'Du Brésil', 'Des Philippines', 'Du Portugal'),
    (17, 3, 'qcm', "On nous les sert en Italie à l'apéro :", 'Les antipasti', 'Les tapas', 'Las zakouski', 'Les acras'),
    (18, 3, 'qcm', "Où nous proposera-t-on des fajitas ?", 'Au Tex Mex', 'Au restaurant indien', 'Au restaurant libanais', 'Au restaurent marocain'),
    (19, 3, 'qcm', "Dans quel restaurant sert-on de la soupe 'Pho' ?", 'Vietnamien', 'Chinois', 'Cambodjien', 'Thaïlandais'),
    (20, 3, 'qcm', "Spécialité anglaise, qu'est-ce que le black pudding ?", 'Du boudin noir', 'Un pâté aux rogons de mouton', 'Un fondant au chocolat', 'Un plat à base de Marmite'),
    (21, 3, 'qcm', "Quel est le nom du ragoût de veau basque ?", 'Axoa', 'Ttoro', 'Tripota', 'Muxu'),
    (22, 3, 'qcm', "Le bourou bourou est une soupe de légumes et de pâtes, de quel pays est-elle la spécialité ?", 'Grèce', 'Gabon', 'Liban', 'Inde'),
    #Géographie
    (1, 4, 'qcm', "Laquelle de ces villes n'est pas une capitale ?", 'Amalty', 'Skopje', 'Tirana', 'Noursoultan'),
    (2, 4, 'qcm', "Quelle langue parle-t-on au Chili ?", 'Espagnol', 'Portigais', 'Italien', 'Français'),
    (3, 4, 'qcm', "De quel pays l'ouguiya est-elle la monnaie ?", 'Mauritanie', 'Burkina Faso', 'Ghana', 'Gabon'),
    (4, 4, 'qcm', "Quel est numéro de département de l'Oise ?", '60', '58', '59', '61'),
    (5, 4, 'qcm', "Sur quel continent se situe le Sri Lanka ?", 'Asie', 'Océanie', 'Afrique', 'Europe'),
    (6, 4, 'qcm', "Quelle est la capitale constitutionnelle de la Bolivie ?", 'Sucre', 'La Paz', 'Bogota', 'Santa Cruz de la Sierra'),
    (7, 4, 'qcm', "De quel pays le Pérou est-il devenu indépendant le 28 Juillet 1821 ?", 'Espagne', 'Italie', 'Portugal', 'France'),
    (8, 4, 'qcm', "Où se situe Fortaleza ?", 'Brésil', 'Argentine', 'Uruguay', 'Chili'),
    (9, 4, 'qcm', "Ses habitants sont appelés les Maralpins. Quel est ce département français ?", 'Les Alpes-Maritimes', 'Les Hautes-Alpes', 'Les Alpes-de-Haute-Provence', 'La Charente-Maritime'),
    (10, 4, 'qcm', "Quelle est la préfecture du Calvados ?", 'Caen', 'Rouen', 'Amien', 'Missy'),
    (11, 4, 'qcm', "Quel est code Insee des Pyrénées-Orientales ?", '66', '64', '65', '67'),
    (12, 4, 'vrai_faux', "La frontière franco-italienne sépare l'Italie et cinq départements français dont l'Isère.", 'Faux', '', '', ''),
    (13, 4, 'qcm', "A quelle région la presqu'île de Quiberon est-elle rattachée ?", 'Bretagne', 'Normandie', 'Pays de la Loire', 'Île de France'),
    (14, 4, 'vrai_faux', "Ajaccio est la préfecture du département de la Haut-Corse.", 'Faux', '', '', ''),
    (15, 4, 'qcm', "Quel est le code Insee du Haut-Rhin ?", '68', '66', '67', '69'),
    (16, 4, 'qcm', "Quel est lecode Insee de La Réunion ?", '974', '972', '973', '975'),
    (17, 4, 'qcm', "Quelle est la préfecture de la Moselle (57) ?", 'Metz', 'Strasbourg', 'Nancy', 'Toul'),
    (18, 4, 'qcm', "Elle fut la capitale des Indes néerlandaises de 1799 à 1942 sous le nom de Batavia. C'est maintenant la capitale du plus grand archipel du monde, composé de plus de 17000 îles. C'est :", 'Jakarta', 'Tokyo', 'Manille', 'Hong-Kong'),
    (19, 4, 'qcm', "Quel est la couleur du rond se trouvant au centre du drapeau du Japon ?", 'Rouge', 'Jaune', 'Violet', 'Blanc'),
    (20, 4, 'qcm', "Comment appelle-t-on les habitants de la ville de Reims ?", 'Rémois', 'Rémais', 'Rémons', 'Reimsés'),
    (21, 4, 'qcm', "En quelle année l'Inde est-elle devenue indépendante ?", '1947', '1927', '1937', '1957'),
    (22, 4, 'qcm', "De combiende départements est composée la région Nouvelle-Aquitaine ?", '12', '8', '10', '16'),
    (23, 4, 'qcm', "Où se situe le pont Banpo ?", 'Corée de Sud', 'Thaïlande', 'Cambodge', 'Japon'),
    (24, 4, 'qcm', "En quelle année l'Autriche a adhéré à l'Union Européenne ?", '1995', '1984', '1990', '1999'),
    (25, 4, 'qcm', "Dans quelle province canadienne se trouve la ville de Toronto ?", 'Ontario', 'Manitoba', 'Québec', 'Albreta'),
    (26, 4, 'qcm', "Sur quel continent se trouve la Somalie ?", 'Afrique', 'Amérique', 'Océanie', 'Asie');

--Insertion de l'admin dans la table UTILISATEUR
--id_utilisateur, login, mdp, droits
INSERT INTO UTILISATEUR VALUES 
    (1, 'moi', 'motdepasse', 'admin');

--Insertion des niveaux de difficulté dans la table DIFFICULTE
--id_difficulte, libelle, nb_questions
INSERT INTO DIFFICULTE VALUES 
    (1, 'Facile', 10),
    (2, 'Medium', 15),
    (3, 'Difficile', 20);

--Aucune insertion dans la table GAGNE
-- car enregistre les résultats des utilisateurs 