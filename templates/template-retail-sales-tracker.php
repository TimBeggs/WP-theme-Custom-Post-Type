<?php
  /**
   * Template Name: Retail Sales Tracker
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
           <?php echo get_field('sales_tracker_airpress_shortcode',$post->ID);?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>