# Examen Final

Vous êtes confronté.es à une application Laravel existante, identique à celle présentée
lors de [l'exercice 4](https://github.com/nitriques/41b-ex-4).
L'application utilise Laravel Breeze pour l'authentification.
Cette application a été créée en utilisant les commandes suivantes
(Vous n'avez pas besoin de les exécuter, c'est à titre informatif seulement):

```sh
composer create-project laravel/laravel 41b-ex-final
composer require laravel/breeze --dev
php artisan breeze:install --dark
php artisan migrate
npm install
```

0. (2 pts) **Faire fonctionner l'application sur votre poste**  
a) Créer une nouvelle base de donnée (via phpMyAdmi ou autre) qui se nomme `ex-final-<code>`.  
b) Configurer le nom de la base de données dans le fichier `.env`.  
c) Faire les commandes pour installer les dépendances avec `composer install` et `npm install`.  
d) Valider que la connection est valide (`php artisan db:show`)  
e) Rouler les migrations (`php artisan migrate`)  
f) Rouler les seeders (`php artisan db:seed`). Il y en a un pour générer des utilisateurs.  
g) Compiler les assets fournis avec Breeze (`npm run dev` ou `npm run build`)  
h) Partir le serveur de développement (`php artisan serve`). Valider que l'application fonctionne en ouvrant la page d'accueil.  
i) Exécuter les tests (`php artisan test`). À ce stade-ci, il y aura des erreurs, c'est normal.
Une fois le travail terminé, la suite de test devrait être 100% fonctionnelle.  

N'oubliez pas que, Laravel va SUPPRIMER le contenu de la base de données suite à une execution des tests:
Les tests vont rouler les seeds appropriés.
Vous pouvez exécuter les test d'une seule question en qualifiant la commande du nom du fichier:

```sh
# Tester la question 1 uniquement
php artisan test tests/Feature/Question1Test.php
```

1. (3 pts) **Autorisation**  
Créer une `Gate`, dans la méthode `boot()` du fichier `AuthServiceProvider.php`,
nommée `super-admin` qui vérifie que le i) courriel (email) se termine par
`@cmaisonneuve.qc.ca` ET 2) qu'il ne commence PAS par `e-`. Si c'est le cas, on autorise.  
a) Appliquer cette `Gate` à la route GET `/question-1`  
b) Appliquer la même `Gate` avec la directive `@can` dans le fichier blade responsable de la navigation,
sur le lien qui même vers la question 1 uniquement.  
Utilisez la fonctionnalité de recherche de VS code afin de trouver le code responsable des fonctionnalités.

2. (6 pts) **Modèle et base de données**  
Créer les fichiers suivants:  
a) Un fichier `migration` qui crée et détruit une table nommée `question2s`, avec les champs suivants:  
    i)   une colonne id, via `->id()`  
    ii)  une colonne `nom` représentée par une `string` de 100 caractères  
    iii) une colonne `chance` qui est de type `boolean`  
    iv)  une colonne `ddn` qui est de type `date`  
    v)   les colonnes timestamps via `timestamps()`  
b) Un fichier `Model` nommé `Question2`. Assurez-vous que la classe `Question2` permette l'assignation de masse.  
b) Un fichier `Factory` nommé `Question2Factory` qui assigne des valeurs générées avec `fake()`  
c) Un fichier `Seeder` nommé `Question2Seeder` qui crée 1000 entrées dans la base de données.
Assurez-vous d'ajouter votre classe `Question2Seeder` dans le fichier `DatabaseSeeder.php`.

3. (5 pts) **Requêtes Eloquent**  
Rendre fonctionnel le tri dynamique implémenté sur la route `/question-3`, en implémentant
ce qu'il manque dans le controlleur `Question3Controller` et en manipulant l'objet `query` Eloquent.
La vue utilisée est nommée `questions.3`.
Vous devez supporter l'ordre de tri, la colonne de tri ainsi que le nombre de résultats retournés en
fonction des paramètres d'url (query string).

4. (5 pts) **Validation, sauvegarde dans la base de données et "flash"**  
La route `/question-4` présente un formulaire aux utilisateurs authentifié.es. Créer le code nécessaire pour:  
a) Soumettre le formulaire. (Il manque un élément essentiel dans la vue)
b) Valider la requête POST sur route POST `/question-4`.  
b) Effectuer la sauvegarde d'un nouvel enregistrement du model `Question4`.  
c) Faire afficher le message "flash" de succès (le message réside en session).  
Assurez-vous de bien prendre connaissance des règles établies au niveau de la base de donnée
via le fichier de migration `question4`.
Finalement, assurez-vous que les messages d'erreurs sont bien retournés à l'usager.

5. (4 pts) **Création de vues**
Le test d'intégration `Question5Test.php` ne fonctionne pas en ce moment:
il manque des fichiers et du code pour que ce soit fonctionnel.
Vous devez créer les 3 fichiers de vues nécessaires pour faire en sorte que la route `/question-5` retourne une vue
nommée `questions.5.matin` si l'heure de la journée est avant midi, `questions.5.jour` si l'heure de la journée est
avant 20 heures, et `questions.5.soir` sinon.  
Du code vous est fourni pour obtenir facilement l'heure courante.  

6. (2 pts) **Authentification**
La route `/question-6` affiche la vue `questions.6`.
Ajoutez ce qu'il faut dans la vue pour afficher `Oui` si l'usager est connecté ou `Non` s'il ne l'est pas.
Suivez les directives données dans la vue.

7. (3 pts) **Route localisée**
Créer le code nécessaire pour avoir la route `/{lang}/question-7`.
Le nom de cette route doit être `question.7`.
Cette route doit configurer la locale de l'application et retournée la vue `questions.7`.
L'attribut `:href` du lien vers la question 7, dans le fichier de navigation, est vide:
Ajouter le code nécessaire pour générer l'url votre route avec le paramètre `lang` valant `'en'`.
La traduction existe pour les locales `en` et `fr`.

Total / 30
