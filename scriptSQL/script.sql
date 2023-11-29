CREATE TABLE `departements`(
    `idDepartement` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `type_contrat`(
    `idTypeContrat` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `type` VARCHAR(100) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `poste`(
    `idPoste` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL,
    `salaire` DECIMAL(12, 2) NOT NULL,
    `degre` INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `departement_poste`(
    `idDeptPoste` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idDepartement` INT NOT NULL,
    `idPoste` INT NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `genre`(
    `idGenre` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(25) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `statut_marital`(
    `idStatutMarital` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(25) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `candidats`(
    `idCandidat` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL,
    `prenom` VARCHAR(100) NOT NULL,
    `datenaissance` DATE NOT NULL,
    `adresse` VARCHAR(100) NOT NULL,
    `contact` INT NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `idGenre` INT NOT NULL,
    `idStatutMarital` INT NOT NULL,
    `nb_enfants` INT NOT NULL,
    `CV` VARCHAR(100) NOT NULL,
    `LM` VARCHAR(100) NOT NULL,
    `idDeptPoste` INT NOT NULL
)ENGINE = InnoDB;
ALTER TABLE rh.candidats ADD photo varchar(100) NOT NULL;
ALTER TABLE rh.candidats ADD statut INT NOT NULL;
ALTER TABLE rh.candidats ADD idTypeContrat INT NOT NULL;

CREATE TABLE `administrateur`(
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `identifiant` VARCHAR(100) NOT NULL,
    `mdp` VARCHAR(100) NOT NULL
)ENGINE = InnoDB;
alter table administrateur add email varchar(100) NULL;

CREATE TABLE `employes`(
    `idEmploye` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idCandidat` INT NOT NULL,
    `identifiant` VARCHAR(100) NOT NULL,
    `mdp` VARCHAR(100) NOT NULL
)ENGINE = InnoDB;
ALTER TABLE rh.employes ADD statut INT NULL;


CREATE TABLE `employes_infos_pros`(
    `idEmployeInfo` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmploye` INT NOT NULL,
    `idDeptPoste` INT NOT NULL,
    `idTypeContrat` INT NOT NULL,
    `date_debut` DATE NOT NULL,
    `date_fin` DATE NULL
)ENGINE = InnoDB;


CREATE TABLE `type_conge`(
    `idTypeConge` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(100) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `solde_conge`(
    `idSoldeConge` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmploye` INT NOT NULL,
    `solde` DECIMAL(12, 2) NOT NULL
)ENGINE = InnoDB;
ALTER TABLE rh.solde_conge CHANGE solde solde_réel decimal(8,2) NOT NULL;
ALTER TABLE rh.solde_conge ADD solde_previsionnel decimal(8,2) NULL;
ALTER TABLE rh.solde_conge ADD solde_perm decimal(8,2) NULL;
ALTER TABLE rh.solde_conge ADD a_planifier decimal(8,2) NULL;


CREATE TABLE `motif_permission`(
    `idMotifPermission` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idtypeconge` INT NOT NULL,
    `motif` VARCHAR(50) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `demandes_conges`(
    `idDemandeConge` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmploye` INT NOT NULL,
    `idMotifPermission` INT NULL,
    `idTypeConge` INT NOT NULL,
    `date_debut` DATE NOT NULL,
    `date_fin` DATE NOT NULL,
    `etat` INT NOT NULL
)ENGINE = InnoDB;
ALTER TABLE rh.demandes_conges ADD date_demande DATE NULL;
ALTER TABLE rh.motif_permission ADD nbJour INT NULL;


CREATE TABLE `annonces`(
    `idAnnonce` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titre` VARCHAR(100) NOT NULL,
    `contenu` VARCHAR(100) NOT NULL,
    `date_parution` DATETIME NOT NULL,
    `date_debut` DATETIME NOT NULL,
    `date_fin` DATETIME NOT NULL
)ENGINE = InnoDB;
ALTER TABLE rh.annonces ADD photo varchar(100) NULL;
ALTER TABLE rh.annonces MODIFY COLUMN contenu TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL;

CREATE TABLE `type_depart`(
    `idTypeDepart` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL
)ENGINE = InnoDB;

CREATE TABLE `cessation_emploi`(
    `idCessationEmploi` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idTypeDepart` INT NOT NULL,
    `idEmploye` INT NOT NULL,
    `motif` VARCHAR(255) NOT NULL,
    `date_depart` DATE NOT NULL
)ENGINE = InnoDB;
ALTER TABLE rh.cessation_emploi MODIFY COLUMN motif varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL;

ALTER TABLE
    `employes` ADD CONSTRAINT `employes_idcandidat_foreign` FOREIGN KEY(`idCandidat`) REFERENCES `candidats`(`idCandidat`);
ALTER TABLE
    `candidats` ADD CONSTRAINT `candidats_idgenre_foreign` FOREIGN KEY(`idGenre`) REFERENCES `genre`(`idGenre`);
ALTER TABLE
    `candidats` ADD CONSTRAINT `candidats_iddeptposte_foreign` FOREIGN KEY(`idDeptPoste`) REFERENCES `departement_poste`(`idDeptPoste`);
ALTER TABLE
    `candidats` ADD CONSTRAINT `candidats_idstatutmarital_foreign` FOREIGN KEY(`idStatutMarital`) REFERENCES `statut_marital`(`idStatutMarital`);
ALTER TABLE
    `candidats` ADD CONSTRAINT `candidats_idtypecontrat_foreign` FOREIGN KEY(`idTypeContrat`) REFERENCES `type_contrat`(`idTypeContrat`);
ALTER TABLE
    `employes_infos_pros` ADD CONSTRAINT `employes_infos_pros_idemploye_foreign` FOREIGN KEY(`idEmploye`) REFERENCES `employes`(`idEmploye`);
ALTER TABLE
    `employes_infos_pros` ADD CONSTRAINT `employes_infos_pros_idtypecontrat_foreign` FOREIGN KEY(`idTypeContrat`) REFERENCES `type_contrat`(`idTypeContrat`);
ALTER TABLE
    `employes_infos_pros` ADD CONSTRAINT `employes_infos_pros_iddeptposte_foreign` FOREIGN KEY(`idDeptPoste`) REFERENCES `departement_poste`(`idDeptPoste`);
ALTER TABLE
    `demandes_conges` ADD CONSTRAINT `demandes_conges_idemploye_foreign` FOREIGN KEY(`idEmploye`) REFERENCES `employes`(`idEmploye`);
ALTER TABLE
    `demandes_conges` ADD CONSTRAINT `demandes_conges_idmotifpermission_foreign` FOREIGN KEY(`idMotifPermission`) REFERENCES `motif_permission`(`idMotifPermission`);
ALTER TABLE
    `demandes_conges` ADD CONSTRAINT `demandes_conges_idtypeconge_foreign` FOREIGN KEY(`idTypeConge`) REFERENCES `type_conge`(`idTypeConge`);
ALTER TABLE
    `cessation_emploi` ADD CONSTRAINT `cessation_emploi_idemploye_foreign` FOREIGN KEY(`idEmploye`) REFERENCES `employes`(`idEmploye`);
ALTER TABLE
    `departement_poste` ADD CONSTRAINT `departement_poste_iddepartement_foreign` FOREIGN KEY(`idDepartement`) REFERENCES `departements`(`idDepartement`);
ALTER TABLE
    `departement_poste` ADD CONSTRAINT `departement_poste_idposte_foreign` FOREIGN KEY(`idPoste`) REFERENCES `poste`(`idPoste`);
ALTER TABLE
    `motif_permission` ADD CONSTRAINT `motif_permission_motif_foreign` FOREIGN KEY(`idTypeConge`) REFERENCES `type_conge`(`idTypeConge`);
ALTER TABLE
    `solde_conge` ADD CONSTRAINT `solde_conge_idemploye_foreign` FOREIGN KEY(`idEmploye`) REFERENCES `employes`(`idEmploye`);
ALTER TABLE
    `cessation_emploi` ADD CONSTRAINT `cessation_emploi_idtypedepart_foreign` FOREIGN KEY(`idTypeDepart`) REFERENCES `type_depart`(`idTypeDepart`);
