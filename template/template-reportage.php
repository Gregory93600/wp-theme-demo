<?php 

/**
 * Template Name:Reportage
 * 
 *  

*/

?>

<?php get_header( ) ?>

<h2><?php echo get_the_title(); ?></h2>
<p><?php echo get_the_content(); ?></p>

<div>
    <?php //paramètres pour la requête
$args = array(
    'category_name' => 'reportage',
    'order' => 'date_du_reportage',
    'orderby ' => 'DESC'
);

//Exécution de la requête
$query = new WP_Query($args);

//Boucle sur les résultats de la requête
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post(); ?>

<article>
<h3><?php echo get_field('titre_du_reportage') ?></h3>
<p>Description<?php echo get_field('reportage') ?></p>
<img src="<?php echo get_field('image_du_reportage')['sizes']['thumbnail'] ?>" alt="">

<p>Lieu de reportage : <?php echo get_field('lieu_du_reportage')  ?></p>
<p>Date de publication : <?php echo get_field('date_du_reportage') ?></p>
<p><a href="<?php echo get_field('lien_vers_le_reporter') ?>">Voir realisateur</a></p>

</article>
   <?php
 
endwhile;
endif;

//réinitialiser le poste global
wp_reset_postdata();
 ?>
</div>
<?php get_footer() ?>