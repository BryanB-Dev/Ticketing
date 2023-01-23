<?php $this->titre = "Mon Ticketing"; ?>

<div hidden>
    Intro
    Bienvenue sur mon ticketing
    Ce ticketing est un projet de BTS SIO première année basé sur un tuto de baptiste pesquet : "Mon Blog".
    
    <!-- Matériel -->
    Pour débuter ce projet j'ai créé une machine virtuelle debian 11 sous virtualbox
    en utilisant visual studio code en tant qu'ide ainsi que github pour versionner mon projet.
    
    <!-- Sans-mvc -->
    Dans un premier temps j'ai commencé par adapter le code de "Mon Blog" sans-mvc en remplaçant les billets par des tickets,
    les commentaires par des messages et en ajoutant un statut au ticket (ouvert, en attente, fermé).
    
    <!-- Mvc-simple -->
    Par la suite je suis passé en architecture mvc simple en séparant le code dans plusieurs fichiers.
    
    <!-- Mvc-procédural -->
    On passe maintenant en solution procédurale en implémentant les actions du controleurs et les services
    du modèle sous la forme de fonctions.
    Notre ticketing est désormais structuré selon les principes du modèle MVC, avec une séparation nette des responsabilités 
    entre composants. 
    
    <!-- Mvc-object -->
    L'amélioration de l'architecture passe maintenant par la mise en œuvre des concepts de la programmation orientée objet.
    La structure actuelle du site est évidemment beaucoup plus complexe qu'au départ.
    Cette complexité est le prix à payer pour disposer de bases robustes qui faciliteront la maintenance et les évolutions futures.
    L'ajout de nouvelles fonctionnalités se fait à présent en trois étapes :
     - ajout ou enrichissement de la classe modèle associée ;
     - ajout ou enrichissement d'une vue utilisant le gabarit pour afficher les données ;
     - ajout ou enrichissement d'une classe contrôleur pour lier le modèle et la vue.
    En sachant cela, on ajoute maintenant un système permettant d'ajouter des messages sur les tickets.
    
    <!-- Framework -->
    Pour mieux comprendre le fonctionnement d'un framework php, baptiste pesquet nous propose d'en créer un.
    Ce petit framework va nous permettre de configurer les paramètres d'accès à la base de données,
    éviter d'instancier un objet PDO d'accès à la DB à chaque classe, automatiser le routage de requete,
    filtrer les paramètres des requetes en entrée et nettoyer les données insérées dans les vues pour éviter les failles XSS.
    On va également faire de l'url rewriting pour améliorer la lisibilité ainsi que le référencement et ajouter
    un système de connexion.
    
    <!-- Amélioration -->
    À partir de là le tutoriel de baptiste pesquet est terminé. Mais le ticketing n'est pas très beau et pas très
    fonctionnel. On va donc améliorer le design, ajouter des fonctionnalités et héberger le ticketing sur un vps.
</div>