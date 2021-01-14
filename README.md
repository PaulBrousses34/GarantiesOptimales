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
