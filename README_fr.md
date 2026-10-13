ALL STAR TOWER RATER V.4


==== Description générale du projet : 

All Star Tower Rater est un outil conçu pour améliorer l’expérience (pro) de jouer à All Star Tower Defense sur Roblox.
Il offre des fonctionnalités avancées telles que la comparaison d’unités et la visualisation des statistiques pour aider les joueurs à optimiser leur team building.


==== Fonctionnalités : 

-Moteur de recherche avancé d’unités : recherchez rapidement des unités en fonction de différents attributs et statistiques.

-Comparateur d’unités : comparez plusieurs unités côte à côte pour déterminer la meilleure pour votre équipe.

-Visualisation des statistiques : des graphiques pour faciliter l’analyse des statistiques des unités.

-Glossaire interne : explication de chaque terme technique utilisé dans le projet.

-Informations premium : accès privé à des documents professionnels utiles pour améliorer votre expérience de jeu.


==== Comment installer le site sur un XAMPP local :

1) Téléchargez la base de donnée (all_star_tower_rater.sql dans le dossier assets->csv_db)
2) Téléchargez la version souhaitée (dans le dossier All_Star_Tower_v4, prenez le dossier souhaité).
3) Téléchargez XAMPP
4) Créez un dossier All_Star_Tower_Rater dans le dossier htdocs de votre dossier xampp.
5) Copiez dans ce nouveau dossier la version voulue.
6) Pour la base de donnée :

Option 1 : 
	- Téléchargez data.
	- Renommez le dossier data du dossier MySQL de votre dossier xampp en backup.
	- Copiez data dans le dossier MySQL de votre dossier xampp.

Option 2 :
	- Dans le phpMyAdmin du xampp, créez une base de donnée all_star_tower_rater.
	- Importez y all_star_tower_rater.sql.

7) Vérifiez le fichier pdo (assets->php_sup), celui ci doit contenir uniquement les lignes suivants :
<?php

$pdo = new PDO(
    "mysql:host=localhost;dbname=all_star_tower_rater;charset=utf8",
    "root",
    ""
);
?>



==== Bugs actuels :

Les valeurs maximales des graphes ne sont pas bien définies, et on assiste à des valeurs inférieures à 0, et supérieures à 100.


==== Contact :

Discord : youuuma
