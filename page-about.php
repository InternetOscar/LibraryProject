
<?php 

get_header(); ?>
<main>
<picture>
<source media="(max-width: 500px)" srcset="/wordpress2/wp-content/themes/andrea-main-theme/img/leaf1-res2.svg"  >
    <source media="(max-width: 850px)" srcset="/wordpress2/wp-content/themes/andrea-main-theme/img/leaf1-res.svg"  >
    <img src="/wordpress2/wp-content/themes/andrea-main-theme/img/leaf1.svg" class="leaf1" alt="leaf header">
</picture>

<h1 class="top-title-page">Title About</h1>
<div> 
    <?php
    if ( is_active_sidebar( 'p-description-about-widgets' ) ) : ?>
    <div id='p-description-about-widgets' class="chw-widget-area widget-area" role="complementary">
    <?php dynamic_sidebar( 'p-description-about-widgets' ); ?>
    </div>
     
<?php endif; ?>
    </div>

</main>
<?php get_footer(); ?>