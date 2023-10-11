INSERT INTO administrateur (identifiant, mdp)
VALUES
    ('sonia.andrianantenaina', 'adminrh');

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
    (3, 'Circoncision enfant'),
    (3, 'Décès conjoint'),
    (3, 'Décès parent'),
    (3, 'Décès enfant'),
    (3, 'Décès frère ou soeur'),
    (3, 'Déménagement'),
    (3, 'Exhumation parent ou enfant'),
    (3, 'Hospitalisation conjoint ou enfant'),
    (3, 'Mariage du collaborateur'),
    (3, 'Mariage du collaborateur');
