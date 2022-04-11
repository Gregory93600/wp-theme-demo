<?php get_header();?>




<?php
 $video = get_field('video');
$audio = get_field('audio');
$texte = get_field('contenue');
 ?>
<div>

<h2><?php echo get_field('titre') ?></h2>
<h4><?php echo get_field('date') ?></h4>

<?php if($video): ?>
<?php echo $video ?>

<?php elseif ($audio): ?>
<audio src="<?php echo $audio ?>" controls></audio>

<?php else: ?>
<p><?php echo get_field('contenue') ?></p>

<?php endif; ?>

<a href="<?php echo get_page_link(140) ?>"> Retour aux entrevues</a>
</div>



<?php get_footer(  ); ?>