<?php
  /**
   * The template for displaying single posts and pages.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package WordPress
   * @subpackage Sophelle
   * @since 1.0.0
   */
  
  get_header();
  ?>
<main id="site-content" role="main">
  <section class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-12 ">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>