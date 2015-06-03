<?php
/*
 * $bl_quick_finder contain the post object for the printing slide
 * $bl_quick_finder_index the index fot the slide
 * %atts contains the attributes set on the shortcode
 * use this variables to customize your view
 * it also availeble the global variable $bl_quick_finders_printed to have information
 * about already printed gallery in the page
 * */

global $bl_quick_finders_printed;

( 0 === $bl_quick_finder_index ) ? $bl_quick_finder_class="active" : $bl_quick_finder_class="";
?>

<div class="item <?php echo $bl_quick_finder_class?>">
    <?php if ( has_post_thumbnail( $bl_quick_finder_item->ID ) ) { // check if the post has a Post Thumbnail assigned to it.
        echo get_the_post_thumbnail( $bl_quick_finder_item->ID );
    }?>
    <div class="carousel-caption">
        <h2><?php echo $bl_quick_finder_item->post_title; ?></h2>
        <?php echo $bl_quick_finder_item->post_content; ?>
    </div>
</div>
