<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:


# Projet

## Intallation et configuration 

Pour commencer, on verifie si on a bien PHP7, Composer 1.10 installer sur notre machine.
* PHP 7 
Pour installer PHP7 il suffit de cliquer [ici](https://www.php.net/downloads.php)
* Composer
Pour installer la dernière version Composer 1.10, cliqué [ici](https://getcomposer.org/download/)

* Base des données
Pour ce projet on va utiliser une base de donnée deploier sur [always-data](https://phpmyadmin.alwaysdata.com), voir le fichier env.example pour l'accès à la base.

## Création de projet

Pour crée notre projet on utilise la commande suivante : 

__composer create-project --prefer-dist laravel/laravel Test_dev_web_laravel__

Cette commande vous permet de crée un projet laravel 7 si vous avez une version laravel ancienne sur votre machine, sinon pour pouvez utiliser la commande suivante : 

__laravel new Test_dev_web_laravel__

## Création du Modèle Star

Pour crée le Modèle __Star__ on utilise la commande suivante : 

__php artisan make:model Star -a__

Cette commande nous permettra de céer le Model, Factory, le fichier de migration, le Seeder et le controller en même temps.

On effectue la commande suivante afin de créer un lien de stockage dans notre application : 

__php artisan storage:link__
