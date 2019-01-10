<!DOCTYPE html> 
<html <?php language_attributes();?>>
	<head>
        <meta charset="<?php bloginfo('charset');?>"/>
        <meta name="description" content="Intégration d'une maquette en wordpress"/>
        <meta name="author" content="Jojo - www.test.com"/>
		<!-- <link rel="Stylesheet" type="text/css" href="CSS/style.css" media="all"/> -->
        <!-- <link rel="Stylesheet" type="text/css" href="<?php /*bloginfo("stylesheet_url");*/?>" media="all"/> --><!-- Récuperer la feuille de style directement -->      
		<link rel="Stylesheet" type="text/css" href="<?php bloginfo("stylesheet_directory");?>/CSS/style.css" media="all"/><!-- Chercher le dossier de la feuille de style -->
		<!-- <title><?php //bloginfo("title");?></title> --> <!-- Récupérer depuis le panel admin titre du site dans réglages -->	
		<title><?php if (is_home ()) { bloginfo('name'); }
		elseif ( is_category()) { single_cat_title(); echo ' | '; bloginfo('name'); }
		elseif (is_single()) { single_post_title(); echo ' | '; bloginfo('name');}
		elseif (is_front_page()) { bloginfo('name'); echo ' | '; bloginfo('description'); }
		elseif (is_page()) { single_post_title(); echo ' | '; bloginfo('name');}
		else { wp_title('',true); } ?></title>		
        <?php wp_head() ?><!--  Ajout d'un hook, c'est un repere endroit pour lorsqu'on installe un plugin avec css ou js, les plugin sont à intégré dans le footer ou header -->
	</head>
	<body>

