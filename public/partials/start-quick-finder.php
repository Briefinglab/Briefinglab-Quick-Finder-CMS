<?php
/*
 * $bl_slides contain the array of slide to be showed
 * %atts contains the attributes set on the shortcode
 * use this variables to customize your view
 * it also availeble the global variable $bl_sliders_printed to have information
 * about already printed gallery in the page
 * */

global $bl_quick_finders_printed;
?>

<div id="carousel-<?php echo count($bl_quick_finders_printed); ?>" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?foreach($bl_quick_finders as $bl_quick_finder_index => $bl_quick_finder): ?>
            <?php ( 0 === $bl_quick_finder_index ) ? $bl_quick_finder_class="active" : $bl_quick_finder_class=""; ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?php echo $bl_quick_finder_index?>" class="<?php echo $bl_quick_finder_class?>"></li>
        <?endforeach; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
