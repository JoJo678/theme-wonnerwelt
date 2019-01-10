<?php
// Masquer la version de wordpress
remove_action('wp_head','wp_generator');

//Enlever les informations d'erreur de connexion au panel admin
add_filter('login_errors',create_function('$a',"return 'Données saisies invalides';"));

// Ajouter menus admin
add_theme_support('nav_menus');
register_nav_menu('main', 'Navigation Principale');

// Désactiver la barre utilisateur de wordpress
add_filter('show_admin_bar', '__return_false');

// Changer apparence d'un extrait d'article

function custom_excerpt_more($more){
    return '...'; // au lieu de {...}
}
add_filter('excerpt_more','custom_excerpt_more');// On applique le custom au lieu de celui par défaut

// Modifier le nombre de mot extrait

function excerpt($limit){// On met un chiffre qui va être la limite du nombre de mot de l'excerpt
    $excerpt = explode (' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit){
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt).'...';} else { $excerpt = implode(" ", $excerpt); }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        return $excerpt;
}

//Post type portfolio

add_action( 'init', 'portfolio_init' );
function portfolio_init() {
	$labels = array(// Nom utiliser
		'name'               => 'Projects',
		'singular_name'      => 'Portfolio',
		'menu_name'          => 'Portfolio',
		/* 'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'your-plugin-textdomain' ), */
		'add_new'            => 'Ajouter un projet',
		'add_new_item'       => 'Ajouter un nouveau projet',
		'new_item'           => 'Nouveau projet',
		'edit_item'          => 'Modifier un nouveau projet',
		'view_item'          => 'Voir le projet',
		/* 'all_items'          => __( 'All Books', 'your-plugin-textdomain' ), */
		'search_items'       => 'Rechercher un projet',
		'parent_item_colon'  => '',
		'not_found'          => 'Aucun projet trouvé',
		'not_found_in_trash' => 'Aucun projet dans la poubelle'
	);

	$args = array(
		'labels'             => $labels,
       /*  'description'        => __( 'Description.', 'your-plugin-textdomain' ), */
		'public'             => true,
		/* 'publicly_queryable' => true, */
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		/* 'has_archive'        => true, */
		'hierarchical'       => false,
		'menu_position'      => 3,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields')
	);

	register_post_type( 'portfolio', $args );
}


// Taxonomy

add_action( 'init', 'create_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => 'Domaines',
		'singular_name'     => 'Domaine',
		'search_items'      => 'Rechercher un domaine',
		'all_items'         => 'Tous les domaines',
		/* 'parent_item'       => __( 'Parent Genre', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ), */
		'edit_item'         => 'Editer un domaine',
		'update_item'       => 'Modifier un domaine',
		'add_new_item'      => 'Ajouter un domaine',
		'new_item_name'     => 'Nouveau domaine',
		'menu_name'         => 'Domaines',
    );
    
    register_taxonomy('domaines', array('portfolio'), array( // On choisit la taxonomy domaine pour le post type portfolio créer au dessus
        'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'domaines' ),
    ));

	/* $args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	); */

	/* register_taxonomy( 'genre', array( 'book' ), $args ); */

	// Add new taxonomy, NOT hierarchical (like tags)
	/* $labels = array(
		'name'                       => _x( 'Writers', 'taxonomy general name', 'textdomain' ),
		'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'textdomain' ),
		'search_items'               => __( 'Search Writers', 'textdomain' ),
		'popular_items'              => __( 'Popular Writers', 'textdomain' ),
		'all_items'                  => __( 'All Writers', 'textdomain' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Writer', 'textdomain' ),
		'update_item'                => __( 'Update Writer', 'textdomain' ),
		'add_new_item'               => __( 'Add New Writer', 'textdomain' ),
		'new_item_name'              => __( 'New Writer Name', 'textdomain' ),
		'separate_items_with_commas' => __( 'Separate writers with commas', 'textdomain' ),
		'add_or_remove_items'        => __( 'Add or remove writers', 'textdomain' ),
		'choose_from_most_used'      => __( 'Choose from the most used writers', 'textdomain' ),
		'not_found'                  => __( 'No writers found.', 'textdomain' ),
		'menu_name'                  => __( 'Writers', 'textdomain' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'writer' ),
	);

	register_taxonomy( 'writer', 'book', $args ); */
}

// Gérer les images 
add_theme_support('post-thumbnails');
add_image_size( 'slide', 1170, 658, true ); // Avec true permet d'avoir une image de resolution 960x250 si false redimensionnement a partir de 960
add_image_size( 'projet_thumb_folio', 360, 203, true ); // Avec true permet d'avoir une image de resolution 960x250 si false redimensionnement a partir de 960
add_image_size( 'projet_thumb_article', 500, 500, true ); // Avec true permet d'avoir une image de resolution 960x250 si false redimensionnement a partir de 960




?>


