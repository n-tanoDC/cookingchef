# Installation d'un projet Symfony

Télécharger Symfony via le CLI :

 ``` shell-script
symfony new cookingchef
symfony new cookingchef --full
```
Vérifier la configuration de PHP :

 ``` shell-script
symfony check:requirements
```

Démarrer le serveur interne de PHP :

 ``` shell-script
symfony server:start
```

Installation de Maker (générateur de fichiers PHP) :
 ``` shell-script
composer require maker --dev
```