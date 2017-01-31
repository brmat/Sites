#**Corinne Creations :**

Refonte du site corinnecreations.france-artisanat.fr

###Remarques :###
Projet Client n°3 pour la www.wildcodeschool.fr.

###Technologies utilisées :###

PHP Symfony, HTML5, CSS3, Javascript, Jquery, Materialize, PhpStorm.

###Statut :###
 Fermer

# HOW TO INSTALL

## 1 : cloner le dépot GITHUB
   * _$ git clone https://github.com/WildCodeSchool/bleau_S2_2016_corinne_creation.git
   
## 2 : INSTALLER LES COMPOSANT DE SYMFONY
   * _$ composer install
   * Paramêtré le serveur de mail "App/Config/parameters.yml"
       - mailer_host: smtp.xxxxx.net
       - mailer_port: 465
       - mailer_encryption: ssl
       - mailer_auth_mode: login
       - mailer_user: identifiant@xxxxx.net
       - mailer_password: sonmdp
       - secret: ThisTokenIsNotSoSecretChangeIt
   
## 3 : CREER LA BASE DE DONNEES
   * _$ php app/console doctrine:database:create
   
## 4 : METTRE A JOUR LA BASE DE DONNEES
        vérifier que tout se passe bien faire un --dump-sql
   * -$ php app/console doctrine:schema:update --force
   
## 5 - PROCEDER A LA CREATION DES REPERTOIRES SUIVANT 
    A céer dans le dossier web
   - uploads/img-creation
   - uploads/img-ecolabel
   - uploads/img-event
   - uploads/img-presse
   - uploads/img-slider
   - uploads/pictures
   
    Il faut aussi modifier les droits sur ces répetroires
    
## 6 - INSTALLER LES ASSETS
   * _$ php app/console assets:install
    
>Dans l'administrateur, sur la page ecolabel, 

>ajouter dans la barre d'adresse :

>**/new** 

>et insérer une image et/ou un text pour que l'utilisateur final puisse en

>modifier son contenu 

**Page ecolabel\new non visible car non util pour l'utilisateur.**
