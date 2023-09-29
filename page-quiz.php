
<?php
    get_header();
?>


<main id="main-product-page">



<?php

if ( is_active_sidebar( 'p-gallery-products-widgets' ) ) : ?>
    <div id='p-gallery-products-widgets' class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'p-gallery-products-widgets' ); ?>
    </div>

<?php endif; ?>


<h1 class="title-pots">TITLE</h1>
<?php

if ( is_active_sidebar( 'p-gallery-products-pots-widgets' ) ) : ?>
    <div id='p-gallery-products-pots-widgets' class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'p-gallery-products-pots-widgets' ); ?>
    </div>

<?php endif; ?>



<h1 class="title-tools">TITLE</h1>

<?php
if ( is_active_sidebar( 'p-gallery-products-tools-widgets' ) ) : ?>
    <div id='p-gallery-products-tools-widgets' class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'p-gallery-products-tools-widgets' ); ?>
    </div>

<?php endif; ?>



<?php
if ( is_active_sidebar( 'p-gallery-products-fertilisers-gifts-widgets' ) ) : ?>
    <div id='p-gallery-products-fertilisers-gifts-widgets' class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'p-gallery-products-fertilisers-gifts-widgets' ); ?>
    </div>

<?php endif; ?>

</main>
<?php get_footer(); ?>
