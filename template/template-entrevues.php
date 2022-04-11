<?php

/*

Template Name: Entrevues

*/

?>

<?php get_header( ) ?>

<h2><?php echo get_the_title() ?></h2>
<p><?php echo get_the_content() ?></p>



<button onclick ='showEntrevueType("all", this)' class="btn-all">Tous</button>
<button  onclick ='showEntrevueType("video", this)' class="btn-video">Vidéo</button>
<button  onclick ='showEntrevueType("audio", this)'class="btn-audio">Audio</button>
<button  onclick ='showEntrevueType("text", this)'class="btn-text">Texte</button>
<br>
<br>


<div class='flex'>
<?php 
//paramètres pour la requête
$args = array(
    'post_type'=>'entrevue',
    'orderby'=>'date',
    'order'=>'DESC'
);

//Exécution de la requête
$query = new WP_Query($args);

//Boucle sur les résultats de la requête
if ($query->have_posts()) :
while ($query->have_posts()) : $query->the_post(); 

$video = get_field('video');
$audio = get_field('audio');
$texte = get_field('contenue');


$type = ($video) ? 'video':(($audio)? 'audio' : 'text');
?>


 
<a href="<?php echo get_permalink( ) ?>"data-type ='<?php echo $type ?>'   class='flex entrevue'>
<div>

</div>
<?php if($video): ?>

<?php //echo $video ?>
<img src="<?php  echo get_template_directory_uri(  ) ?>/images/video_camera.png" alt="">
<?php elseif ($audio): ?>

<audio src="<?php //echo $audio ?>"></audio>
<img src="<?php  echo get_template_directory_uri(  ) ?>/images/microphone.jpg" alt="">
<?php else: ?>

<p><?php //echo get_field('contenue') ?></p>
<img src="<?php  echo get_template_directory_uri(  ) ?>/images/text.jpg" alt="">
<?php endif; ?>

<div>
<h3><?php echo get_field('titre') ?></h3>
</div>
</a>
<?php
endwhile;
endif;

//réinitialiser le poste global
wp_reset_postdata();

?>
</div>
<?php get_footer() ?>

