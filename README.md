# SLF
Application web de type marketplace — inscription, connexion, panier, paiement, notifications, etc.

---

## Description

SLF est une application web construite en PHP, CSS et JavaScript, visant à proposer une plateforme de type marketplace. Elle permet aux utilisateurs de s’inscrire, de se connecter, de parcourir des articles, d’ajouter des articles au panier, de procéder à un paiement, de recevoir des notifications, de gérer leur compte, etc. 

---

## Fonctionnalités

Voici les principales fonctionnalités actuellement présentes :

* Gestion du compte utilisateur;
* Navigation dans le catalogue d’articles;
* Ajout d’articles au panier;
* Processus de paiement;
* Notifications / alertes lorsqu'un nouvel article correspondant à tes critères est posté;
* Suppression ou modification d’articles.

---

## Installation et configuration

Pour lancer ce projet en local :

1. Clonez ce dépôt :

   ```bash
   git clone https://github.com/Laura29092002/SLF.git
   cd SLF
   ```

2. Assurez‑vous que vous avez un serveur web du type MySQL.

3. Créez une base de données (ex : `slf_db`) et configurez l’accès dans `database.php` (hôte, utilisateur, mot de passe, nom de la base).

4. Importez les tables nécessaires si un script SQL est fourni (sinon créez manuellement les tables utilisateurs, articles, paniers, paiements, notifications…).

5. Ouvrez `site.php` dans votre navigateur (ex : [http://localhost/SLF/site.php](http://localhost/SLF/site.php)) pour démarrer l’application.


Si tu veux, je peux générer également un fichier `LICENSE`, ou un document **README européen multilingue (FR/EN)**. Veux‑tu que je le fasse ?
