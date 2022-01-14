<?php
  /**
   * Template Name: Newsletter
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
  <section class="c-newsletter">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-12 col-sm-12 col-md-7 pr-lg-5">
          <?php if (get_field('newsletter_content') != '') {?>
          <div class="row justify-content-center services-list">
            <?php
              // check if the repeater field has rows of data
              if( have_rows('newsletter_content',$post->ID) ):
              // loop through the rows of data
              while ( have_rows('newsletter_content',$post->ID) ) : the_row();
              
              $newsletter_r_link = get_sub_field('button');
              if( $newsletter_r_link ){ 
                  $link_url = $newsletter_r_link['url'];
                  $link_title = $newsletter_r_link['title'];
                  $link_target = $newsletter_r_link['target'] ? $newsletter_r_link['target'] : '_self';
               }
               ?>
            <div class="col-xl-12 col-12 col-sm-12 col-md-12 col-lg-12">
              <div class="img-with-text">
                <div class="content">
                  <h2><?php echo get_sub_field('heading', $post->ID); ?></h2>
                  <?php echo get_sub_field('content',$post->ID);?>
                  <?php if( $newsletter_r_link ): ?>
                  <a class="btn-theme-transparent mt-3" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php 
              endwhile;
              else :
                // no rows found
              endif;
              ?>
          </div>
          <?php } ?>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 col-sm-12 col-md-5">
          <div class="sphl-sidebar mt-5 mt-md-2">
            <?php get_sidebar(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>