<?php get_header();?>
<div id="menuFixed">
<?php
	$html = '[maxmegamenu location=max_mega_menu_2]';
	$html2 = '[maxmegamenu location=max_mega_menu_1]';				
	echo do_shortcode("[wpmem_logged_in]".$html."[/wpmem_logged_in]" );
	echo do_shortcode("[wpmem_logged_out]".$html2."[/wpmem_logged_out]" );
	echo do_shortcode("[maxmegamenu location=main]" );
	?>
</div>
<?php
	if(isset($_GET["choix"])){
?>
	<div id="panelUser">
		<?php 
		if ($_GET["choix"] === "inscription"){
		?>
		<?php 
			$html = '<button type="button" id="btnForm" onclick="showPanel()">X</button> [wpmem_form register]';
			echo do_shortcode("[wpmem_logged_out]".$html."[/wpmem_logged_out]" );
		?>
		<?php 
		}
		else{
			if ($_GET["choix"] === "connexion"){
			?>	
			<?php 
				$html = '<button type="button" id="btnForm" onclick="showPanel()">X</button> [wpmem_form login]';
				echo do_shortcode("[wpmem_logged_out]".$html."[/wpmem_logged_out]" );
			?>
			<?php 
			}
			else{
				if ($_GET["choix"] === "panel"){
				?>	
				<?php 
					$html = '<button type="button" id="btnForm" onclick="showPanel()">X</button> [wpmem_profile]';
					echo do_shortcode("[wpmem_logged_in]".$html."[/wpmem_logged_in]" );
				?>
				<?php 
					if ($_GET["a"] === "pwdreset"){
						$html = '<button type="button" id="btnForm" onclick="showPanel()">X</button> [wpmem_form password]';
						echo do_shortcode("[wpmem_logged_out]".$html."[/wpmem_logged_out]" );
					}
					if ($_GET["a"] === "getusername"){
						$html = '<button type="button" id="btnForm" onclick="showPanel()">X</button> [wpmem_form forgot_username]';
						echo do_shortcode("[wpmem_logged_out]".$html."[/wpmem_logged_out]" );
					}
				}	
			}
		}
		?>	
	</div>
<?php
	}
?><div id="cheminMain"></div>
	<div id="containerMain">
		<div class="containerDessin" id="container">
		</div>
		<div class="containerTexte" id="container2">
			<div id="arbre"></div>
			<div id="fleur"></div>	
			<div id="chateau"></div>
			<div id="logo"></div>
			<div id="content">
				<h2 id="lien2" class="titreMenu">Projet pédagogique / Réglement</h2>
				<section id="content-blank">   
					<!-- Si y a du contenu on fait une Boucle sur le contenu -->
					<?php query_posts( 'p=1' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>			
		</div>
		<div class="containerDessin" id="container3"></div>		
		<div class="containerTexte" id="container4">
		<div id="poisson"></div>	
		<div id="barriere1"></div>	
			<div id="barriere2"></div>		
			<div id="content">
				<h2 id="lien3" class="titreMenu">L'équipe</h2>
				<section id="content-blank">   
					<!-- Si y a du contenu on fait une Boucle sur le contenu -->	
					<?php query_posts( 'p=12' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>	
		</div>
		<div class="containerDessin" id="container5">
		<div id="enfant"></div>
		<div id="buisson"></div>
		<div id="ecureil"></div>	
		</div>
		<div class="containerTexte" id="container6">
			<div id="content">
				<h2 id="lien4" class="titreMenu">Les repas</h2>
				<section id="content-blank">   
					<?php query_posts( 'p=14' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>	
		</div>
		<div class="containerDessin" id="container7">		
			<div id="arbre2"></div>	
		</div>
		<div class="containerTexte" id="container8">
			<div id="arbre"></div>
			<div id="enfant"></div>	
			<div id="content">
				<h2 id="lien5" class="titreMenu">Les partenaires</h2>
				<section id="content-blank">   
					<!-- Si y a du contenu on fait une Boucle sur le contenu -->
					<?php query_posts( 'p=16' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>		
		</div>
		<div class="containerDessin" id="container9">
			<div id="enfant"></div>				
		</div>
		<div class="containerTexte" id="container10">
			<div id="content">
				<h2 id="lien6" class="titreMenu">Les plannings d'activités</h2>
				<section id="content-blank">   
					<!-- Si y a du contenu on fait une Boucle sur le contenu -->
					<?php query_posts( 'p=18' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>			
		</div>	
		<div class="containerDessin" id="container11">
		<div id="ours"></div>								
		</div>
		<div class="containerTexte" id="container12">			
			<div id="chien"></div>	
			<div id="enfants"></div>	
			<div id="content">
				<h2 id="lien7" class="titreMenu">Les sorties</h2>
				<section id="content-blank">   
					<!-- Si y a du contenu on fait une Boucle sur le contenu -->
					<?php query_posts( 'p=20' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>							
		</div>
		<div class="containerDessin" id="container13"></div>			
		<div class="containerTexte" id="container14">
			<div id="sol"></div>
			<div id="fleur"></div>	
			<div id="content">
				<h2 id="lien8" class="titreMenu"></h2>
				<section id="content-blank">
					<div id="test">   
					<?php query_posts( 'p=93' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?> 
					</div>    
				</section>
			</div>					
		</div>
		<div class="containerDessin" id="container15">	
			<div id="enfant"></div>		
		</div>
		<div class="containerTexte" id="container16">
			<div id="enfant1"></div>
			<div id="enfant2"></div>
			<div id="content">
				<h2 id="lien9" class="titreMenu"></h2>
				<section id="content-blank">   
					<?php query_posts( 'p=119' ); ?>	
					<?php while (have_posts() ) : the_post(); ?> 
						<?php the_content(); ?>		
					<?php endwhile;?> 
					<?php wp_reset_query();?>     
				</section>
			</div>
		</div>
		<div class="containerDessin" id="container17"></div>	
		<div class="containerTexte" id="container18">
			<div id="enfants"></div>
			<div id="enfants2"></div>
			<div id="herbe"></div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d192.52258085362556!2d6.109828603149268!3d49.51727691937133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479537ce89e40acd%3A0xd9e9862e4462b473!2s68+Rue+Marie-Th%C3%A9r%C3%A8se%2C+3257+Bettembourg%2C+Luxembourg!5e0!3m2!1sfr!2sbe!4v1534249485832"  height="750" frameborder="0" style="border:0" allowfullscreen></iframe>					
			<div id="foot">	
				<div id="part1">
					<h2>Siège social</h2>
					<p>Foyer de jour Wonnerwelt 68 rue Marie-Thérèse L-3257 Bettembourg</p>
				</div>
				<div id="part2">
					<h2>Contactez-nous :</h2>
					<p>Du lundi au vendredi de 6h à 20h Tél BE: (+32) 26 51 27 43</p>
				</div>	
			</div>		
		</div>
	</div>	
<?php get_footer();?>