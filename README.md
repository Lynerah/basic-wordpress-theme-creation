# Workshop
## Créer un thème Wordpress 

C'est dans le cadre de ma formation en Web Developpement que j'ai du réaliser ce workshop.

#### Téléchargement de Local

Rendez-vous sur le site <www.localwp.com> , téléchargez gratuitement l’application.

![local](/img/local.png)

![Download](/img/download_local.png)

![form](/img/download_form.png)

Lorsque l’exécutable est prêt cliquez dessus et suivez les consignes pour l’installation de l’application.  

!(img/local_instal)

Cliquez sur le bouton « *Créer un nouveau site* » et suivez les étapes.

!(img/create_a_new_site) 

Dans le cadre de ce workshop nous allons prendre les paramètres de base sans rentrer dans les détails.

!(img/site_name)
!(img/environement)
!(img/name-password)

Voila votre Wordpress est installé.

!(img/your_site_Local)

Pour ceux qui ont déjà fait un peu de PHP ou Wordpress, Local ne travaille pas avec PHPMyAdmin. Il propose **Adminer ou Sequel Pro**. Encore une fois par facilité, je vais utiliser Adminer.

Maintenant il ne reste plus qu’a trouver où ont été installé nos fichiers Wordpress. Vous pouvez rapidement trouver l’information en haut sous le nom de votre site.

!(img/doc_location)

Analysons ensemble les différents documents et fichiers que nous trouvons. 
On voit trois dossiers **wp-content, wp-admin et wp-includes**. Nous allons en parler juste après regardons d’abord quelques fichiers. 
Par convention tout serveur php aura un fichier **index.php**, dès qu’il y aura une requête c’est ce fichier qui se lancera en premier. 

On retrouve aussi le fichier **wp-config.php et wp-config-sample.php**. Le premier est, comme on peut l’imaginer, le fichier de configuration de Wordpress, utile au bon fonctionnement de wordpress et le seul fichier du coeur de WP que vous pourrez modifier (en effet, les modifications apportées dans les autres seront effacées lors des mise à jour). Le deuxième sert de modele à wp-config.php lors de l’installation de wordpress.
Ensuite, nous avons **wp-login.php** qui va réaliser la connexion avec l’interface admin. Pour accéder à cette interface, nous devrons écrire à la fin de l’URL du site /wp-admin/.

Pour conclure avec les fichiers, **wp-signup.php** est la page de création de compte utilisateur pour le site.

Apres ce survole des fichiers importants, faisons de même avec les dossiers. 

**wp-includes** est le dossier coeur de Wordpress tous ce qu’on peut retrouver dans Wordpress se trouve là (catégories, gestions des articles, commentaires, menus,…). On ne touchera pas non plus à ce dossier.

Dans **wp-admin** nous allons trouvé le code de l’interface d’administration. C’est pour cela qu’on tape monsite.com/wp-admin/ pour y accéder. Dans ce dossier, chaque page correspond à une page de l’admin. Nous pouvons nous en rendre compte garce à l’URL. Nous ne touchons pas non plus à ce dossier. Si on veut ajouter des fonctions à la manier des extensions, il existe pour cela les hooks ( nous ne les aborderons pas d’avantage ici).

Enfin nous arrivons au dossier **wp-content**, seul dossier dans lequel nous allons pourvoir chipoter ;-) 

On y trouve plusieurs sous-dossier : **themes** (nous y retrouvons les thèmes de base de WP), **plugins** ( ici se retrouve les extensions), **uploads** (ensemble du multimédia).

Jusque là tous va bien? Alors continuons ! ;-)

##### Debuggeur PHP

Avant de rentrer dans le vif du sujet je vous propose d’aller activer un paramètre plutôt utile dans wp-config.php, le mode debug. 

Cherchons la ligne qui contient **WP_DEBUG** et passons sa valeur à **true** ( si c’est déjà le cas ne changez rien).

`define('WP_DEBUG', true);`

*Lors de la mise en ligne du site n’oubliez pas de remettre la valeur sur false ou de supprimer la ligne. Sinon les utilisateurs du site auront eux aussi un message avec l’erreur.* 

#### Création du thème

Passons maintenant à la création de notre thème.
Pour cela rendez-vous dans **wp-content -> thèmes**. Là nous allons créer un nouveau dossier pour notre thème, choisissez le nom que vous voulez. Je vais le nommer « *myfirsttheme* ». Dans le dossier, je vais commencer par créer l’indispensable fichier **index.php** . 

Dans index.php écrivez un titre et sauvez :

`<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Salut la compagnie</h1>
</body>
</html>`

Si nous allons maintenant sur notre page d'administration dans thème (wordpress) nous voyons notre thème apparaître avec un message disant qu’il est corrompu.

En effet pour que notre thème soit considéré comme valide, il nous manque un dernier fichier.

Retournons dans notre éditeur et créons un nouveau fichier **style.css**, dans lequel nous allons inscrire un commentaire reprenant les informations du thème. Dans ce commentaire, nous pouvons y inscrire plusieurs informations (pour voir l'ensemble des informations possible rendez-vous dans le fichier style.css des thèmes de base de Wordpress). Si vous ne désirez pas mettre l’ensemble des informations, juste le nom du thème est suffisant.

Ici, j’ai choisis de mettre le nom du thème, l’auteur et une description (*attention il ne doit pas avoir d’espace entre le nom du critère et les « : »*).

`Theme Name: First Theme
Author: Jeanne Dark
Description: Mon premier thème !
*/`

Sauvegardons et voyons le résultat.

Pour avoir une image qui apparait pour représenter le thème il suffit d’enregistrer une image intitulé **screenshot.png** et il sera pris automatiquement en compte par Wordpress.

Maintenant nous allons pouvoir **activer notre thème**. Cliquez sur le bouton « *activer* ». On peut alors se rendre sur notre site et nous verrons apparaitre notre titre « *Salut la compagnie* ». 

Voilà techniquement vous venez de réaliser votre premier thème Wordpress, félicitation!

Bon pour l’instant il n’y pas grand choses dedans. Allons plus loin et complétons ce thème.

Retournons sur notre fichier **index.php** et complétons notre structure de page basique :

`<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title>Workshop</title>
</head>
<body>
	<h1>Salut la compagnie</h1>
</body>
</html>`

Le fait est que nous allons probablement pas avoir que une page sur notre site. Donc afin d’avoir un code DRY c’est-a-dire sans répétition inutile de code. On va créer deux fichiers, **header.php et footer.php** dans lesquels on va mettre une partie du code. Puis nous viendrons appeler ces fichiers dans index.php .

Dans un fichier header.php couper/coller la premier partie du code jusque `<body>` .

`<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<title>Workshop</title>
</head>
<body>`

Créez un second fichier footer.php avec la fin du code a partir de `</body>`

`</body>
</html>`

Dans la plupart des cas, ces deux parties là seront identique à toutes les pages du site.

Maintenant comment faire pour les intégrer dans notre index.php?
Nous allons utiliser une fonction PHP bien pratique **« get_header » et « get_footer »**.

`<?php get_header(); ?>
	<h1>Hello World</h1>
<?php get_footer(); ?>`

Vérifions si notre code fonctionne toujours. Ouvrez le code source de la page dans votre console  afin de voir si votre header et footer sont bien appelés. 

Ça fonctionne? Parfait!

Revenons à notre header.php, nous créons un thème wordpress nous devons donc pouvoir communiquer avec notre CMS. Pour cela nous allons ajouter des **fonctions en php**.

`<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>  
    <?php wp_body_open(); ?>`

Faisons un petit tour d’horizon de ces quelques fonctions.

1. **language_attributes()** 
Cette fonction permet de définir automatiquement la langue du site en fonction des réglages encodés dans wordpress dans Réglages -> Général -> Langue du site

2. **bloginfo(‘charset')**
Il représente l’encodage du site qui est pas défaut UTF8,

3. **wp_head()** 
Fonction importante dans le bon fonctionnement du thème car c’est là que vont venir se mettre les scripts et le styles du thème et des extensions. C’est là aussi que nous retrouverons la balise `<title>` qui sera activée dans function.php . 

4. **body_class()**
Ajoute des classes à notre body en fonction des pages visitées.

`<body class="home blog logged-in admin-bar no-customize-support">` 

Mais rien nous oblige à utiliser cette fonction. Si vous l’utilisez faite attention à ne pas reprendre les noms de classe CSS de wordpress ailleurs afin de ne pas créer de conflit.

5. **wp_body_open()**
Cette fonction permet à des extension d’écrire du code au début du body.

Dans footer.php, nous allons mettre la fonction `<?php wp_footer(); ?>` qui équivaux wp_head() mais pour le footer.
 
`<?php wp_footer(); ?>
</body>
</html>`

##### Fichier function.php

Faisons quelques réglages. Créons le fichier **function.php**, c’est ici que nous allons activer toutes fonctionnalité nécessaire pour notre thème.

Commençons par deux choses toute simple:

1. Activer la prise en charge des images mises en avant, ce sont les images accompagnent les article et leur résumé.

2. Activer l’ajout automatique de la balise `<title>` dans l’en-tête. Par défaut on vois alors apparaitre le titre du site et le slogan dans l’onglet du navigateur. Nous pouvons modifier ces données dans le tableau d’administration: Réglages > Général.

`<?php 
add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );`

Comme vous pouvez le constater je n’ai pas fermé la balise php, car dans les documents php on ne ferme pas la balise.

Nous le ferons pas ici mais nous pouvons aller beaucoup plus loin dans le réglage des fonctions outre activer des fonctionnalités, on peut déclarer des emplacements de menus, des feuilles de styles et scripts JS, … Vous travaillerez ici avec les *hooks*. Ils permettent de changer les comportent de wordpress sans en changer le code source.

La seule chose que nous allons quand même encore faire est de rajouter une feuille de style de Bootstrap pour nous facilité un peu la tache. On va donc utiliser un hooks:

`function myfirsttheme_register_assets(){
	wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap');
}
add_action('wp_enqueue_scripts', 'myfirsttheme_register_assets');`

On appelle ici la fonction **wp_register_style()** qui comporte plusieurs paramètres:
1. **$handle** : on inscrit au premier paramètre le nom unique du fichier css.
1. **$src** : on indique l’emplacement du fichier. Dans notre cas nous allons mettre la src cdn de bootstrap. Il existe aussi *get_stylesheet_uri()* pour charger le fichier style.css qui se trouve à la racine du thème. 
1. **$dps** : cela permet d’indiquer si un script ou stylesheet est dépendant d’un autre qui devra alors être chargé avant. On tape alors *array()* et on indiques les handle des stylesheet ou script en question :  `array( ‘nom_du_style/script’ )`.
1. **$ver**: la version permet lors des mise à jour de notre thème d’invalider le cache de l’ancienne version fait par le navigateur.
1. **$media** : il est possible de spécifier le type de media, est accepté *'all', 'print' et ‘screen'* ou de media queries. 

Moi je vais juste indiquer ici le handle et la source.

Alors pourquoi la mettre ici dans function.php et non pas dans le header.php? Car WP est un écosystème CMS, extension et thème vont communiquer entre eux, chacun va avoir ses scripts et ses feuilles de style. Grâce a la fonction wp_head() elles seront charger dans notre script.

Profitons de l’ajout de ce style pour mettre une div avec une class container sur notre page;

**header.php**

`<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div class="container">`

Nous allons fermer cette div dans **footer.php**

`	</div>
	<?php wp_footer(); ?>
</body>
</html>`

Pour continuer plus aisément la création de notre thème on va avoir besoin d’y *ajouter du contenu*. Nous allons donc ajouter des catégories, des pages et générer des articles.

##### Ajouter des catégories 

Rendez-vous sur votre panneau administrateur, dirigez-vous vers **article -> catégorie** 
Créez les catégories suivante: livre, BD, filme, série, documentaire, divers.

!(img/create_categories)

##### Ajouter des pages 

Direction **page -> ajouter** et créons une page accueil, blog et contact.

!(img/create_page)

##### Une page d'accueil pour le site 

Wordpress met par défaut le blog comme page d’accueil. Rendons nous dans **Réglages -> Lecture** et changeons cela.
Dans *la page d’accueil affiche* on coche une *page statique* et on choisi accueil pour la page d’accueil et blog pour page des articles.

Enregistrez les modifications.

##### Création d’article 

Pour créer des article facilement nous avons utiliser un extension, **FakerPress**

!(img/fakerpress_plugin)

Nous allons devoir d’abord télécharger cette extension. Allez sur **Extensions -> Ajouter**, rechercher FakerPress, téléchargez et activez le.

##### Configurez FakerPress

Dans la bar latérale de votre panneau d’administration, vous devez voir apparaître FakerPress Cliquez dessus et aller dans Articles 

*Inscrivez par exemple 20 articles, cette année, type de contenu article, l’auteur, taxonomie article, quantité 1.*

!(img/setting_fakerpress_2)
!(img/setting_fakerpress_3)

Cliquez sur générer.

Vous pouvez vous rendre dans **Articles -> Tous les articles** pour les voir.

##### Template Hierarchy

Cette partie est très bien expliqué par Capitaine WP : <https://capitainewp.io/formations/developper-theme-wordpress/template-hierarchy>

!(img/hierarchy_template)

##### Les fichiers template

Nous allons maintenant créer l’ensemble de nos fichiers template.
Créons les fichiers **archive.php, front-page.php, home.php, page.php, single.php**.

!(img/create_template_page)

Pour chacun on mets le strict minimum:

`<?php get_header(); ?>
	<h1>titre de la page</h1>
<?php get_footer(); ?>`

##### Les boucles Wordpress

La boucle ce retrouve pratiquement sur tout les template et aura toujours la même forme.

`<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        // Display post content
    endwhile; 
endif; 
?>`

C’est grâce à cette boucle qu’on va pouvoir aller chercher les données qui ont été entrées par l’interface administrateur.

Commençons par modifier notre fichier **front-page.php**, qui correspond à notre page d’accueil.

`<?php get_header(); ?>
	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    	<h1><?php the_title(); ?></h1>
    	<?php the_content(); ?>
	<?php endwhile; endif; ?>
<?php get_footer(); ?>`

Comme vous le constaterez dans ce code de nouvelles fonctions apparaissent.

`if( have_posts() )` permet de vérifier qu’il y a bien quelque chose à afficher.
Puis nous avons notre boucle while qui commence sur le contenu disponible de la page. `the_post()` va permettre de préparer le contenu des données pour les afficher, en fonction des templates tags. Ici nous avons `the_title()`, qui permet d’afficher le titre et `the_content()` qui lui affichera le contenu de la page.

Il existe plusieurs templates tags que vous retrouverez ici : <https://developer.wordpress.org/themes/basics/the-loop/>

Maintenant créons un boucle pour le blog. Mettez le code ci-dessous dans **archive.php et home.php**.

`<?php get_header(); ?>
	<h1>Le blog</h1>
	<?php if (have_posts()): while(have_posts()): the_post();?>
		<article class="post">
			<h2><?php the_title();?></h2>
			<?php the_post_thumbnail();?>
			<p class="post_meta">
				Publié le <?php the_time(get_option('date_format'));?> par <?php the_author();?>
			</p>
			<?php the_excerpt();?>
			<a href="<?php the_permalink();?>">Lire la suite</a>
		</article>
	<?php endwhile; endif;?>
<?php get_footer(); ?>`

Allons voir notre page. Pour cela nous pouvons soit passer par le panneau admin **Pages -> Toutes les pages** et afficher la page blog soit ajouter si notre page s’appelle blog **/blog/** à la suite de notre url du site.

**the_post_thumbnail()** permet d’afficher l’image mise en avant. Elle revoit toute la balise `<img>`. L’avantage est qu’aucune balise vide ne sera mise s’il n’y a pas de photo.

**the_time( get_option( 'date_format' ) )** permet de récupérer la date ainsi que son format d’affichage que nous avons choisis dans le tableau admin (**Réglages -> général -> Format de date**). 
 
**the_author()** affiche le nom de l’auteur qui a été défini dans Utilisateurs -> Votre profil -> Nom à afficher publiquement. Attention si rien n’est configuré, Wordpress affichera votre identifiant comme nom d’auteur.

**comments_number()** va nous chercher le nombre de commentaires pour l’article.

**the_excerpt()** affiche un extrait de l’article. Vous pouvez soit référencer un extrait spécifique en allant sur la barre latéral à droite de votre article dans wordpress. Sinon WP va prendre les 55 premiers caractères de l’article.

**the_excerpt()** est placé dans l’attribut href dans la balise `<a>` et affichera le lien vers l’article.
La structure des premaliens peut être gérée dans **Réglages -> Permaliens**.

Nous pouvons ajouter un peu de mise en forme avec *Bootstrap*.

`<article class="post">
	<div class="card" style="width: 18rem;">
		<?php if ( has_post_thumbnail() ): ?>
			<?php the_post_thumbnail(‘medium’, [ ‘classe’ => ‘card-img-top’, 				‘alt’ => ‘’ ]); ?>
			</div>
		<?php endif; ?>
		<div class="card-body">
			<h5 class="card-title"><?php the_title(); ?></h5>
			<div class="card-text"><?php the_excerpt(); ?></div>
			<a href="<?php the_permalink(); ?>" class="btn btn-primary 						post__link">Lire la suite</a>
		</div>
	</div>
</article>`

##### Barre de navigation

Pour finir ajoutons une *barre de navigation*. Pour gérer les menus nous retournons sur notre panneau d’administration dans **Apparence -> Menus**. Pour l’instant cette partie n’est pas visible, nous aller déclarer le menu dans function.php

`register_nav_menus( array(
	'main' => 'Menu Principal',
) );`

Plaçons le menus dans **header.php** avec la fonction **wp_nav_menu()**

 `<?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>`

Enfin nous pouvons aller créer ce menu dans WordPress.
 
Et oui, il est plutot basique, mais ajoutons un peu de Bootstrap .

`<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href=“<?php bloginfo( 'url' ); ?>“><?php bloginfo( 'name' ); ?></a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php wp_nav_menu( array( 'theme_location' => 'main', 'container' => 'fals', 'menu_class' => 'navbar-nav mr-auto' ) ); ?>
			</div>
		</nav>
	</header>
    <div class="container">`

---

Voilà, pour l'apperçu de la création d'un theme Wordpress.
Je vous mets ci-dessous les sources dont je me suis inspirée pour ce workshop.

---

##### Source

*Capitaine WP*, <https://capitainewp.io/formations/developper-theme-wordpress/charger-les-scripts-et-les-styles>

*Grafikart*, <https://www.youtube.com/c/grafikart>

*Code reference*, <https://developer.wordpress.org/reference/>

*Le guide Wordpress*, <https://wordpress.bbxdesign.com/anatomie-dun-theme>
