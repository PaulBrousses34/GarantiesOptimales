# **PROJET DE COURTAGE EN ASSURANCE EN LIGNE** 

![Logo Garanties Optimales](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/GO.png)

## Garanties Optimales ##
### *L'assurance des professionnels et des particuliers, des garanties optimales à prix minimal* 


## 1. Présentation du projet

### a) Présentation de la société

Créée en 2010, la société MGL Courtage (nouvellement LIGUORI ASSURANCES) basé à Sète (34200) est spécialisée dans le courtage en assurance pour les particuliers et professionnels. Société à taille humaine (2 employés), elle est aussi familiale (père et fils). 

Possédant un portefeuille client solide sur la ville de Sète et également aux alentours, le chiffre d’affaires stagne depuis quelques années (même si celui reste élevé). 

Ambitieux, le fils et Gérant de l’association souhaite étendre sa zone de chalandise au niveau régional voir national, en créant une marque commerciale sur le net : Garanties Optimales. 

### b) Les objectifs du site

Le site aura pour objectif d’accroître l’activité de la société MGL Courtage et d’étendre sa zone de chalandise au niveau national.  

Ce site devra permettre au client d’obtenir des devis en ligne ainsi que de souscrire en ligne à une assurance. 

Il servira également de plateforme d’échange de documents et d’assistance entre les clients et la société. 

### c) La cible

Toutes personnes majeures, de n’importe quelle CSP. Que ce soit particulier ou professionnel, de la France entière.  

### d) Périmètre du projet 

Le site se devra d’être totalement responsive (adaptable sur mobile, tablette et desktop), j’estime que le trafic sera très hétérogène en matière de support, d’où l’importance d’apporter une attention toute particulière à cela.  

Le site en revanche ne nécessite pas d’être multilingue au vu de la cible (France). 


## 2. Description graphique

### a) Charte Graphique

Je possède déjà le logo de MGL Courtage, et à partir de celui pourrait définir une palette couleur. 

##### Les logos en ma possession : 

![Logos Société](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/logoDouble.png)

##### La palette graphique à partir du logo : 

![Palette graphique](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/palette.png)

### b) Design

Le design du site se veut plutôt simpliste et intuitif. La première version doit être mis en ligne assez rapidement et certainement des améliorations sur le design seront mis en œuvre dans les versions suivantes. 

### c) Maquettes

Au regard des éléments en ma possession et après un entretien avec Mr Liguori, j’ai effectué les maquettes du site. 

##### Proposition page d’accueil Desktop : 

![Maquette Home Desktop](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/maquetteHomeDesktop.png)

##### Proposition page d’accueil Mobile :

![Maquette Home Mobile](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/maquetteHomeMobile.png)

##### Legende maquette :

![Legende](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/legendeMaquette.png)


## 3. Description fonctionnelle et technique 

### a) Arborescence du site

![Arborescence](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/arborescence.png)

[Voir en meilleure qualité](https://www.gloomaps.com/tKhyTdfZmj )

### b) Description fonctionnelle

Au regard de notre premier entretien, nous avons défini les grandes lignes du futur site et évalué les besoins. L’application devra donc comprendre : 
-     Un Back-Office. 
-     Un espace membre, où retrouver ses documents, les échanger et déclarer un sinistre 
-     Une base de données. 
-     Une possibilité d’inscription à la newsletter. 

On peut donc identifier 3 types d’utilisateurs : 
-     Le visiteur ayant accès à l’ensemble du site (sauf espace membre et back office). 
-     L'utilisateur connecté bénéficiant d’un espace membre. 
-     Les administrateurs ayant accès au back office. 


### c) Informations relatives aux contenus

Les divers éléments amenés à alimenter l’application sont notamment des articles, des modifications, ajouts et suppressions de formules d’assurances, l’ajout de nouveau produits. 

Tout cela sera fourni par les compagnies d’assurance et par le gérant de la société. Ce contenu sera intégré à la base de données.  

Le contenu devra dans le même temps être ajouté aux réseaux sociaux. 


### d) Technologies utilisées 

#### Outils de conception et de stockage :  

-    GitHub, pour le stockage et la gestion des versions. 

-    Trello, pour l’organisation des tâches. 

-    Google Drive, pour le stockage de la documentation. 

-    Mocodo, pour la création du Modèle Conceptuel de Données. 

-    Balsamiq, pour la création des Wireframes. 

-    GlooMaps, pour la conception de l’arborescence. 

-    Toolki, pour la palette de couleur. 

##### Développement côté Frontend :  

-    Twig, le moteur de Template de Symfony. 

-    JavaScript, langage pour dynamiser les éléments. 

-    JQuery, librairie JavaScript. 

-    Bootstrap, le Framework JavaScript/CSS afin de styliser le site et faciliter le responsive design. 

##### Développement côté Backend :  

-    Symfony 5, le Framework PHP. 

-    MySQL, le gestionnaire de base de données. 

-    Doctrine, l’Object Relational Mapping de Symfony. 

-    PhpMyAdmin, l’interface de gestion de base de données. 

J’utiliserai également Google Analytics afin d’avoir des informations sur le trafic du site ainsi que “tarteauciton” pour la gestion des cookies.  


### e) User stories


|En tant que|Je veux pouvoir|Afin de|
|---    |:-:    |:-:    |
| Visiteur |Consulter les actualités|Me tenir informé de l’actualité de l’assurance |       
|       |Consulter les informations juridiques de la société |Connaître les mentions légales |
|       |En savoir plus sur MGL Courtage |Afin de connaître la société|
|       |Contacter la société via un formulaire de contact|Obtenir de renseignements, proposer quelque chose ou porter une réclamation |
|       |Consulter les diverses assurances proposées|Me renseigner sur les propositions faites par Garanties Optimales|
|       |Obtenir un devis et/ou souscrire à une assurance|Souscrire ou obtenir un devis |
|       |Créer un compte|Bénéficier d’un espace personnel|
| Utilisateur connecté |Accéder à mes documents|Retrouver facilement les documents relatifs à mon/mes assurance(s)|
|       |Echanger des documents facilement avec mon courtier|Faciliter l’échange de document|
|       |Déclarer directement un sinistre en ligne|Faciliter la déclaration de sinistre|
| Administrateur |Ajouter, modifier, supprimer un article|Gérer le contenu du site |
|       |Ajouter, modifier, supprimer un utilisateur|Gérer le contenu du site |
|       |Ajouter, modifier, supprimer un produit d’assurance|Gérer le contenu du site|

### f) Dictionnaire des routes

|Controller|URL|HTTP Method|Method|Title|Content|
|---    |:-:    |:-:    |:-:    |:-:    |--:    |
| **FrontOffice** |
|HomeController|/|GET|home|Accueil|Actu, liste produit et contact|
| |/contact-formulaire|GET-POST|contact|Contact|Formulaire de contact|
|NewsletterController|/newsletter|GET|Browse|Actualités|Liste de tout les articles|
| |/newsletter/{id}|GET|Read|Article|Un article|
|AssuranceController|/assurances/categorie/{slug}|GET|Browse|Assurance par catégorie|Liste des produits par catégorie|
||/assurances/sous-categorie/{slug}|GET|Browse|Assurance par sous-catégorie|Liste des produits par sous-catégorie|
||/assurances/types/{slug}|GET|Browse|Assurance par type|Liste des produits par type|
||/assurances/demande-devis|GET-POST|askDevis|Formulaire de demande de devis|Formulaire spécifique demande de devis|
||/assurances/devis/{slug}|GET|Read|Devis {slug}|Affiche le tarificateur selon le produit souhaité|
|UserController|/profil/{nom}/{id}|GET|Read|Mon espace personnel|Affiche les informations utilisateurs et les documents|
||/profil/edition/ {nom}/{id}|GET-POST|Edit|Modifier mon profil|Affiche le formulaire de modification du profil|
||/profil/suppression/{nom}/{id}|DELETE|Delete|Bouton de suppression|Supprimer mon profil|
|SecurityController|/connexion/{nom}/{id}|GET – POST|app_login|Connexion|Formulaire de connexion|
||/deconnexion|POST|app_logout|Déconnexion|Bouton ou lien de deconnexion|
| **BackOffice** |
|NewsletterCrudController|/admin/newsletter|GET|Browse|Toutes les actualités|Liste des actualités|
||/admin/newsletter/{id}|GET|Read|{title} de l'article|Affichage d’un article en particulier|
||/admin/newsletter/edition/{id}|GET-POST|Edit|Modifier un article|Formulaire de modification de l’article|
||/admin/newsletter/ajouter|GET-POST|Add|Ajouter un article|Formulaire d’ajout d’un article|
||/admin/newsletter/suppression/{slug}|DELETE|Delete|Suppression d'un article|Bouton de suppression d'un article|
|SousCategorieCrudController|/admin/assurances/sous-categorie|GET|Browse|Liste de toutes les sous catégories|Affichage de la liste des types par sous catégorie|
||/admin/sous-categorie/{slug}|GET|Read|Sous catégorie {slug}|Affichage d'une sous catégorie|
||/admin/sous-categorie/edition/{slug}|GET-POST|Edit|Modifier une sous catégorie|Formulaire de modification d'une sous catégorie|
||/admin/sous-categorie/ajouter|GET-POST|Add|Ajouter une sous catégorie|Formulaire d’ajout d’une sous catégorie|
||/admin/sous-categorie/suppression/{slug}|DELETE|Delete|Suppression d'une sous catégorie|Bouton de suppression d'une sous catégorie|
|TypeCrudController|/admin/assurances/types|GET|Browse|Liste de toutes les types|Affichage de la liste des types|
||/admin/types/{slug}|GET|Read|Type {slug}|Affichage d'un type|
||/admin/types/edition/{slug}|GET-POST|Edit|Modifier un type|Formulaire de modification d'un type|
||/admin/types/ajouter|GET-POST|Add|Ajouter un type|Formulaire d’ajout d’un type|
||/admin/types/suppression/{slug}|DELETE|Delete|Suppression d'un type|Bouton de suppression d'un type|
|DocumentCrudController|/admin/document|GET|Browse|Liste de tous les documents|Affichage de la liste des documents|
||/admin/document/{id}|GET|Read|Document {id}|Affichage d'un document|
||/admin/document/edition/{slug}|GET-POST|Edit|Modifier un document|Formulaire de modification d'un document|
||/admin/document/ajouter|GET-POST|Add|Ajouter un document|Formulaire d’ajout d’un document|
||/admin/document/suppression/{slug}|DELETE|Delete|Suppression d'un document|Bouton de suppression d'un document|
|UtilisateurCrudController|/admin/utilisateurs|GET|Browse|Liste de tous les utilisateurs|Affichage de la liste des utilisateurs|
||/admin/utilisateur/{id}|GET|Read|Utilisateur {name}|Affichage d'un utilisateur|
||/admin/utilisateur/edition/{slug}|GET-POST|Edit|Modifier un utilisateur|Formulaire de modification d'un utilisateur|
||/admin/utilisateur/ajouter|GET-POST|Add|Ajouter un utilisateur|Formulaire d’ajout d’un utilisateur|
||/admin/utilisateur/suppression/{id}|DELETE|Delete|Suppression d'un utilisateur|Bouton de suppression d'un utilisateur|

### g) Dictionnaire des données

|Table|Champ|Type|Spécificités|
|---    |:-:    |:-:    |:-:    |
|Categorie|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED |
||name|VARCHAR (255)|NOT NULL|
||createdAt|TIMESTAMP|NOT NULL, CURRENT_TIMESTAMP|
||updatedAt|TIMESTAMP|NULL|
||slug|VARCHAR (255)|NOT NULL|
|SousCategorie|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED |
||name|VARCHAR (255)|NOT NULL|
||createdAt|TIMESTAMP|NOT NULL, CURRENT_TIMESTAMP|
||updatedAt|TIMESTAMP|NULL|
||slug|VARCHAR (255)|NOT NULL|
||categorie_id|INT|NOT NULL, FOREIGN KEY|
|Type|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED |
||name|VARCHAR (255)|NOT NULL|
||createdAt|TIMESTAMP|NOT NULL, CURRENT_TIMESTAMP|
||updatedAt|TIMESTAMP|NULL|
||slug|VARCHAR (255)|NOT NULL|
||Sous_categorie_id|INT|NOT NULL, FOREIGN KEY|
|Newsletter|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED |
||title|VARCHAR (255)|NOT NULL|
||image|VARCHAR (255)|NOT NULL|
||content|VARCHAR (50000)|NOT NULL|
||createdAt|TIMESTAMP|NOT NULL, CURRENT_TIMESTAMP|
||updatedAt|TIMESTAMP|NULL|
|Document|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED |
||utilisateur_id|INT|NOT NULL, FOREIGN KEY|
||fichier|VARCHAR (255)|NOT NULL|
||type|VARCHAR (255)|NOT NULL|
||dateTelechargement|TIMESTAMP|NOT NULL, CURRENT_TIMESTAMP|
||updated|TIMESTAMP|NULL|
|User|id|INT|PRIMARY KEY, NOT NULL, AUTO_INCREMENT, UNSIGNED |
||firstname|VARCHAR (255)|NOT NULL|
||lastname|VARCHAR (255)|NOT NULL|
||email|VARCHAR (255)|NOT NULL|
||rôles|JSON|NOT NULL|
||adress|VARCHAR (255)|NULL|
||ville|VARCHAR (255)|NULL|
||codePostal|INT|NULL|
||newsletter|BOOL|NOT NULL|


### h) Modèle Logique de Données

![Modèle Logique de Données](https://raw.githubusercontent.com/PaulBrousses34/GarantiesOptimales/master/public/assets/images/photos/MLD.png)


## 4. Organisation

### a) Planning

Le développement du site se fera sur 6 semaines. Suite à la mise en production une veille technologique est à prévoir. Le développement du site ne pourra commencer que lorsque le cahier des charges sera complet. Chaque sprint dure 1 semaine sauf le 4eme qui est prévu sur 2 semaines. Le travail s’effectuera selon les principes de la méthodes Agile Scrum les cycles de développement seront donc découpés en sprint de la manière suivante : 

|Sprint 1|Intégration HTML/CSS, création de la base de données, création de fixtures|
|Sprint 2|Création des Controllers et des méthodes, création des formulaires, création des templates associés à toutes les méthodes|
|Sprint 3|Mise en en place des diverses contraintes, gestion des rôles, création et configuration BackOffice|
|Sprint 4|Création des fiches produits|
|Sprint 5|Recherche et correction de bugs, tests unitaires et fonctionnels, mise en production|

### b) Gestion du versionning


Chaque jour le développement se fera sur une nouvelle branche Git se nommant 12/12 par exemple si la date du jour est le 12 décembre. Cela permet de récupérer facilement la version voulue. Chaque jour les tâches effectuées seront notées dans un cahier de bord afin de récupérer plus facilement une partie du code en cas de problème. 
