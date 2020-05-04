# Installation d'un projet Symfony

## Télécharger Symfony 
Télécharger Symfony via le CLI :

```shell script
symfony new cookingchef
symfony new cookingchef --full
```
Vérifier la configuration de PHP :

```shell script
symfony check:requirements
```

Démarrer le serveur interne de PHP :

```shell script
symfony server:start
```

## Maker
Installation de Maker (générateur de fichiers PHP) :
```shell script
composer require maker --dev
```

## Twig
Installation du moteur de template Twig : 
 ```shell script
composer require twig
```

## Webpack
Installation de Webpack Encore (gestionnaire JS/CSS) :
 ```shell script
composer require encore
```

Générer les balises link et script :
 ``` twig
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}
            {{ encore_entry_link_tags('app') }}
        {% endblock %}
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}
            {{ encore_entry_script_tags('app') }}
        {% endblock %}
    </body>
</html>
```
Démarrer la compilation des assets : 
```shell script
npm run watch
```

Activer la compilation du SCSS : 
- Renommer le fichier assets/css/app.css --> assets/css/app.scss
- Modifier l'import dans le fichier assests/js/app.js --> ```import '../css/app.scss'```
- Dans le fichier webpack.config.js, décommenter la ligne 57 ".enableSassLoader()"

```shell script
npm install sass-loader@^7.0.1 node-sass --save-dev
```