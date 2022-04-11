<?php

/*

Template Name: Gabarit galeries

*/

?>

<?php get_header( ) ?>

<div class="imageGallery1 a">
<?php 

$images = get_field('galeries');

if( $images ): ?>

    
        <?php foreach( $images as $image ): ?>
        
          <a href="<?php echo $image['full_image_url'] ?>" title="<?php echo $image['title'] ?>"><img src="<?php echo $image['thumbnail_image_url']?>" alt=""></a>   
        <?php endforeach; ?>

<?php endif; ?>
    </div>
<?php get_footer() ?>

