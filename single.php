<?php get_header();?>

<?php if(in_category('reporters')){
    
        get_template_part( 'template/parts/single','reporter' );
    }else if(in_category( 'reportage')){
        get_template_part('template/parts/single','reportage');
    }else{
        get_template_part('template/parts/single','news');
    }

 ?> 




<?php get_footer(  ); ?>