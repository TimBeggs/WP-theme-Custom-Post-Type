<?php
  /**
   * Template Name: Retail Trade Show
   *
   * @package WordPress
   * @since 1.0
   */
  ?>
<?php get_header();
  if(have_posts()) { 
  the_post();
  }?>
<main id="site-content" role="main">
  <section class="c-retail-trade">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
            <?php the_content(); ?>
           <?php echo get_field('trade_show_sec_one_airpress_shortcode',$post->ID);?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>