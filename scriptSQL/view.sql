create or REPLACE view employé_infos as
SELECT e.idEmploye, e.identifiant, e.mdp, c.*, eip.idTypeContrat, eip.date_debut, eip.date_fin, dp.idDepartement, dp.idPoste  from employes e
join candidats c on c.idCandidat = e.idCandidat
join employes_infos_pros eip on e.idEmploye = eip.idEmploye
join departement_poste dp on dp.idDeptPoste = c.idDeptPoste;
