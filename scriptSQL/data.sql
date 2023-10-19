INSERT INTO administrateur (identifiant, mdp)
VALUES
    ('rh.admin', 'adminrh');

INSERT INTO statut_marital (nom)
VALUES
    ('Célibataire'),
    ('Marié'),
    ('Divorcé'),
    ('Veuf');

INSERT INTO genre (nom)
VALUES
    ('Homme'),
    ('Femme');

INSERT INTO type_contrat (type)
VALUES
    ('CDI'),
    ('CDD'),
    ('Stage'),
    ('Apprentissage'),
    ('Alternant');

INSERT INTO type_conge (nom)
VALUES
    ('Congé payé'),
    ('Congé non payé'),
    ('Congé de maternité'),
    ('Repos maladie'),
    ('Permission exceptionnelle');

INSERT INTO motif_permission (idtypeconge, motif)
VALUES
    (5, 'Circoncision enfant'),
    (5, 'Décès conjoint'),
    (5, 'Décès parent'),
    (5, 'Décès enfant'),
    (5, 'Décès frère ou soeur'),
    (5, 'Déménagement'),
    (5, 'Exhumation parent ou enfant'),
    (5, 'Hospitalisation conjoint ou enfant'),
    (5, 'Mariage du collaborateur'),
    (5, 'Mariage du collaborateur');

INSERT INTO departements (nom)
VALUES
    ('Développement logiciel'),
    ('Qualité et tests'),
    ('Infrastructures et réseaux'),
    ('Cybersécurité'),
    ('Support technique'),
    ('Design et UX/UI'),
    ('JAVA'),
    ('PHP'),
    ('Mobilité et applications mobiles'),
    ('Ventes et marketing'),
    ('Ressources humaines'),
    ('Administration et finances');

INSERT INTO poste (nom, salaire, degre)
VALUES
    ('Développeur junior', 450000.00, 1),
    ('Développeur senior', 850000.00, 1),
    ('Chef de projet fonctionnel', 950000.00, 1),
    ('Team Lead', 110000.00, 2),
    ('Lead Tech', 120000.00, 2),
    ('Testeur junior', 400000.00, 1),
    ('Testeur senior', 750000.00, 1),
    ('Analyste qualité', 60000.00, 2),
    ('Responsable assurance qualité', 85000.00, 2),
    ('Technicien réseau', 45000.00, 1),
    ('Administrateur système', 55000.00, 1),
    ('Architecte réseau', 80000.00, 2),
    ('Analyste en sécurité informatique', 55000.00, 1),
    ('Ingénieur en sécurité réseau', 65000.00, 1),
    ('Chef de la sécurité de l''information', 90000.00, 2),
    ('Auditeur en sécurité informatique', 60000.00, 1),
    ('Technicien de support', 35000.00, 1),
    ('Spécialiste du support technique', 45000.00, 1),
    ('Analyste du support client', 55000.00, 1),
    ('Chef du support technique', 65000.00, 2),
    ('Designer UX/UI junior', 45000.00, 1),
    ('Designer UX/UI senior', 65000.00, 1),
    ('Chef UX/UI', 75000.00, 1),
    ('Directeur du design', 90000.00, 2),
    ('Représentant des ventes', 65000.00, 1),
    ('Chef des ventes', 75000.00, 1),
    ('Directeur des ventes et du marketing', 90000.00, 2),
    ('Spécialiste en marketing numérique', 60000.00, 1),
    ('Assistant RH', 40000.00, 1),
    ('Responsable RH', 65000.00, 1),
    ('Directeur des ressources humaines', 80000.00, 2),
    ('Responsable du recrutement', 60000.00, 1),
    ('Spécialiste en formation', 60000.00, 1),
    ('Assistant administratif', 40000.00, 1),
    ('Comptable', 55000.00, 1),
    ('Directeur administratif et financier', 80000.00, 2),
    ('Responsable des achats', 60000.00, 1),
    ('Analyste de crédit', 60000.00, 1);

INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(1, 1, 1);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(2, 1, 2);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(3, 1, 3);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(4, 1, 4);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(5, 1, 5);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(6, 2, 6);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(7, 2, 7);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(8, 2, 8);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(9, 2, 9);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(10, 3, 10);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(11, 3, 11);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(12, 3, 12);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(13, 4, 13);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(14, 4, 14);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(15, 4, 15);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(16, 4, 16);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(17, 5, 17);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(18, 5, 18);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(19, 5, 19);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(20, 5, 20);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(21, 6, 21);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(22, 6, 22);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(23, 6, 23);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(24, 6, 24);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(25, 7, 1);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(26, 7, 2);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(27, 7, 3);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(28, 7, 4);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(29, 7, 5);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(30, 8, 1);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(31, 8, 2);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(32, 8, 3);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(33, 8, 4);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(34, 8, 5);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(35, 9, 1);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(36, 9, 2);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(37, 9, 3);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(38, 9, 4);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(39, 9, 5);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(40, 10, 25);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(41, 10, 26);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(42, 10, 27);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(43, 10, 28);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(44, 11, 29);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(45, 11, 29);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(46, 11, 30);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(47, 11, 31);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(48, 11, 32);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(49, 11, 33);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(50, 12, 34);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(51, 12, 35);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(52, 12, 36);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(53, 12, 37);
INSERT INTO rh.departement_poste
(idDeptPoste, idDepartement, idPoste)
VALUES(54, 12, 38);


INSERT INTO candidats (nom, prenom, datenaissance, adresse, contact, email, idGenre, idStatutMarital, nb_enfants, CV, LM, idDeptPoste, photo, statut)
VALUES
    ('Doe', 'John', '1980-05-15', '123 Rue de la République', 0323635849, 'john.doe@email.com', 1, 2, 2, 'john_doe_cv.pdf', 'john_doe_lm.pdf', 1, 'john_doe.jpg', 1),
    ('Smith', 'Alice', '1990-08-25', '456 Avenue des Fleurs', 0325648974, 'alice.smith@email.com', 2, 1, 0, 'alice_smith_cv.pdf', 'alice_smith_lm.pdf', 2, 'alice_smith.jpg', 2),
    ('Brown', 'Robert', '1985-11-10', '789 Boulevard des Étoiles', 0345612345, 'robert.brown@email.com', 1, 3, 3, 'robert_brown_cv.pdf', 'robert_brown_lm.pdf', 3, 'robert_brown.jpg', 3),
    ('Johnson', 'Maria', '1995-03-20', '1010 Elm Street', 0389625233, 'maria.johnson@email.com', 2, 2, 1, 'maria_johnson_cv.pdf', 'maria_johnson_lm.pdf', 1, 'maria_johnson.jpg', 1),
    ('Garcia', 'Carlos', '1988-07-12', '567 Oak Avenue', 0384526159, 'carlos.garcia@email.com', 1, 2, 0, 'carlos_garcia_cv.pdf', 'carlos_garcia_lm.pdf', 2, 'carlos_garcia.jpg', 2),
    ('Chen', 'Li', '1992-01-05', '1234 Maple Lane', 0335612578, 'li.chen@email.com', 2, 1, 2, 'li_chen_cv.pdf', 'li_chen_lm.pdf', 3, 'li_chen.jpg', 3),
    ('Lee', 'Hye-Jin', '1987-06-30', '987 Willow Road', 0345269875, 'hye-jin.lee@email.com', 2, 2, 3, 'hye_jin_lee_cv.pdf', 'hye_jin_lee_lm.pdf', 1, 'hye_jin_lee.jpg', 1),
    ('Kowalski', 'Anna', '1991-12-15', '456 Pine Street', 0321645978, 'anna.kowalski@email.com', 2, 1, 1, 'anna_kowalski_cv.pdf', 'anna_kowalski_lm.pdf', 2, 'anna_kowalski.jpg', 2),
    ('Nguyen', 'Tuan', '1984-04-08', '111 Cedar Avenue', 0321564598, 'tuan.nguyen@email.com', 1, 2, 2, 'tuan_nguyen_cv.pdf', 'tuan_nguyen_lm.pdf', 3, 'tuan_nguyen.jpg', 3),
    ('Gonzalez', 'Javier', '1983-09-17', '555 Birch Lane', 0385269874, 'javier.gonzalez@email.com', 1, 1, 0, 'javier_gonzalez_cv.pdf', 'javier_gonzalez_lm.pdf', 1, 'javier_gonzalez.jpg', 1);

INSERT INTO rh.employes
(idEmploye, idCandidat, identifiant, mdp)
VALUES(1, 10, 'javier.gonzalez', 'G0nz@l3zJ@vier');

INSERT INTO annonces (titre, contenu, date_parution, date_debut, date_fin)
VALUES
    ('Réunion d''équipe', 'Nous aurons une réunion d''équipe demain pour discuter des projets en cours.', '2023-10-15 10:00:00', '2023-10-16 08:00:00', '2023-10-16 12:00:00'),
    ('Formation sur la sécurité informatique', 'Une formation sur la sécurité informatique est prévue le 20 octobre.', '2023-10-16 15:30:00', '2023-10-20 09:00:00', '2023-10-20 16:00:00'),
    ('Annonce de vacances', 'L''entreprise sera fermée pour les vacances de Noël du 24 décembre au 2 janvier.', '2023-10-17 14:15:00', '2023-12-24 00:00:00', '2024-01-02 00:00:00'),
    ('Nouvelle politique de télétravail', 'Nous avons mis en place une nouvelle politique de télétravail à partir du 1er novembre.', '2023-10-18 11:45:00', '2023-11-01 08:00:00', '2023-11-01 17:00:00'),
    ('Projet d''équipe - Appel à volontaires', 'Nous cherchons des volontaires pour un projet d''équipe passionnant.', '2023-10-18 15:00:00', '2023-10-19 09:00:00', '2023-11-19 17:00:00');

INSERT INTO annonces (titre, contenu, date_parution, date_debut, date_fin, photo)
VALUES ('Soirée de remise des prix', 'Rejoignez-nous le 15 novembre pour notre soirée annuelle de remise des prix. Célébrons nos réussites ensemble !', '2023-10-25 12:00:00', '2023-11-15', '2023-11-15', 'event1.jpg');
INSERT INTO annonces (titre, contenu, date_parution, date_debut, date_fin, photo)
VALUES ('Formation en leadership', 'Inscrivez-vous à notre formation en leadership qui débutera le 1er novembre. Une opportunité unique !', '2023-10-20', '2023-11-01', '2023-11-30', 'formation1.jpg');
