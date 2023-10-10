CREATE TABLE `Administrateur`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `identifiant` VARCHAR(255) NOT NULL,
    `mdp` VARCHAR(255) NOT NULL
);

CREATE TABLE `DépartementPoste`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idDepartement` INT NOT NULL,
    `idPoste` INT NOT NULL
);
CREATE TABLE `MotifCongé`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `raison` VARCHAR(255) NOT NULL,
    `idtypecongé` INT NOT NULL
);
CREATE TABLE `Departements`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL
);
CREATE TABLE `Poste`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL,
    `salaire` DECIMAL(8, 2) NOT NULL,
    `degré` INT NOT NULL
);
CREATE TABLE `StatutMarital`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL
);
CREATE TABLE `Candidats`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `datenaissance` DATE NOT NULL,
    `adresse` VARCHAR(255) NOT NULL,
    `contact` INT NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `idGenre` INT NOT NULL,
    `idStatutMarital` INT NOT NULL,
    `nb_enfants` INT NOT NULL,
    `CV` VARCHAR(255) NOT NULL,
    `idDeptPoste` INT NOT NULL
);
CREATE TABLE `DemandesCongés`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmployé` INT NOT NULL,
    `idMotifCongé` INT NOT NULL,
    `idTypeCongé` INT NOT NULL,
    `date_debut` DATE NOT NULL,
    `date_fin` DATE NOT NULL,
    `etat` INT UNSIGNED NOT NULL
);
CREATE TABLE `Annonces`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `titre` VARCHAR(255) NOT NULL,
    `contenu` VARCHAR(255) NOT NULL,
    `date_parution` DATETIME NOT NULL,
    `date_debut` DATETIME NOT NULL,
    `date_fin` DATETIME NOT NULL
);
CREATE TABLE `Genre`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL
);
CREATE TABLE `Employés`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idCandidat` INT NOT NULL,
    `identifiant` VARCHAR(255) NOT NULL,
    `mdp` VARCHAR(255) NOT NULL
);
CREATE TABLE `TypeCongé`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL
);
CREATE TABLE `SoldeCongé`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmployé` INT NOT NULL,
    `solde` DECIMAL(8, 2) NOT NULL
);
CREATE TABLE `TypeContrat`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `type` VARCHAR(255) NOT NULL
);
CREATE TABLE `EmployésInfosPros`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmployé` INT NOT NULL,
    `idDeptPoste` INT NOT NULL,
    `idTypeContrat` INT NOT NULL,
    `date_debut` DATE NOT NULL,
    `date_fin` DATE NOT NULL
);
CREATE TABLE `CessationEmploi`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `idEmployé` INT NOT NULL,
    `motif` VARCHAR(255) NOT NULL,
    `date_depart` DATE NOT NULL,
    `etat` INT NOT NULL
);
ALTER TABLE
    `Employés` ADD CONSTRAINT `employés_idcandidat_foreign` FOREIGN KEY(`idCandidat`) REFERENCES `Candidats`(`id`);
ALTER TABLE
    `EmployésInfosPros` ADD CONSTRAINT `employésinfospros_idemployé_foreign` FOREIGN KEY(`idEmployé`) REFERENCES `Employés`(`id`);
ALTER TABLE
    `Candidats` ADD CONSTRAINT `candidats_idgenre_foreign` FOREIGN KEY(`idGenre`) REFERENCES `Genre`(`id`);
ALTER TABLE
    `EmployésInfosPros` ADD CONSTRAINT `employésinfospros_idtypecontrat_foreign` FOREIGN KEY(`idTypeContrat`) REFERENCES `TypeContrat`(`id`);
ALTER TABLE
    `DemandesCongés` ADD CONSTRAINT `demandescongés_idemployé_foreign` FOREIGN KEY(`idEmployé`) REFERENCES `Employés`(`id`);
ALTER TABLE
    `DemandesCongés` ADD CONSTRAINT `demandescongés_idmotifcongé_foreign` FOREIGN KEY(`idMotifCongé`) REFERENCES `MotifCongé`(`id`);
ALTER TABLE
    `DemandesCongés` ADD CONSTRAINT `demandescongés_idtypecongé_foreign` FOREIGN KEY(`idTypeCongé`) REFERENCES `TypeCongé`(`id`);
ALTER TABLE
    `Candidats` ADD CONSTRAINT `candidats_iddeptposte_foreign` FOREIGN KEY(`idDeptPoste`) REFERENCES `DépartementPoste`(`id`);
ALTER TABLE
    `CessationEmploi` ADD CONSTRAINT `cessationemploi_idemployé_foreign` FOREIGN KEY(`idEmployé`) REFERENCES `Employés`(`id`);
ALTER TABLE
    `DépartementPoste` ADD CONSTRAINT `départementposte_iddepartement_foreign` FOREIGN KEY(`idDepartement`) REFERENCES `Departements`(`id`);
ALTER TABLE
    `DépartementPoste` ADD CONSTRAINT `départementposte_idposte_foreign` FOREIGN KEY(`idPoste`) REFERENCES `Poste`(`id`);
ALTER TABLE
    `MotifCongé` ADD CONSTRAINT `motifcongé_idtypecongé_foreign` FOREIGN KEY(`idtypecongé`) REFERENCES `TypeCongé`(`id`);
ALTER TABLE
    `Candidats` ADD CONSTRAINT `candidats_idstatutmarital_foreign` FOREIGN KEY(`idStatutMarital`) REFERENCES `StatutMarital`(`id`);
ALTER TABLE
    `SoldeCongé` ADD CONSTRAINT `soldecongé_idemployé_foreign` FOREIGN KEY(`idEmployé`) REFERENCES `Employés`(`id`);
ALTER TABLE
    `EmployésInfosPros` ADD CONSTRAINT `employésinfospros_iddeptposte_foreign` FOREIGN KEY(`idDeptPoste`) REFERENCES `DépartementPoste`(`id`);
