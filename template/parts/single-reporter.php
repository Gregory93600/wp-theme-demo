<?php if(have_posts()) : ?>



<?php while(have_posts()): the_post(  ); ?>



<article class="flex">
<div class="image-article quart">

   <?php if(get_field('photo')) :?>

      <img src="<?php echo get_field('photo')['sizes']['large']?>"alt=""> 

   <?php endif ?>

</div>
<div class="texte-article trois-quart">

   <h3><?php echo get_field('prenom'); ?>&nbsp;<?php echo get_field('nom') ?></h3>

       <p><?php echo get_field('description'); ?></p>
       <p> Expérience : <?php echo get_field('annees_dexperience'); ?></p>

</div>
</article>
<?php endwhile; ?> 
<?php endif; ?>
