<?php
  /**
   * Template Name: Retail Resources
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
  <section class="c-retail-r">
    <div class="container">
      <?php if (get_field('retail_r_content_sec_one_heading') != '' || get_field('retail_r_content_sec_one_content') != '') {?>
      <div class="row justify-content-center align-items-center mb-4 mb-lg-5">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 text-center">
          <?php if (get_field('retail_r_content_sec_one_heading') != '' ) {?>
            <h2 class="mb-4">
              <?php echo get_field('retail_r_content_sec_one_heading',$post->ID);?>
            </h2>
          <?php } ?>
          <p class="mb-4"> <?php echo get_field('retail_r_content_sec_one_content',$post->ID);?></p>
        </div>
      </div>
      <?php } ?>
      <?php if (get_field('retail_r_content_retail_resources') != '') {?>
      <div class="row justify-content-center services-list">
        <?php
          // check if the repeater field has rows of data
          if( have_rows('retail_r_content_retail_resources',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('retail_r_content_retail_resources',$post->ID) ) : the_row();
          
          $retail_r_link = get_sub_field('button');
          if( $retail_r_link ){ 
              $link_url = $retail_r_link['url'];
              $link_title = $retail_r_link['title'];
              $link_target = $retail_r_link['target'] ? $retail_r_link['target'] : '_self';
           }
           ?>
        <div class="col-xl-4 col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="card-img-box">
            <?php if (get_sub_field('image') != '') {?>
            <div class="img">
              <a href="<?php echo esc_url( $link_url ); ?>">
              <img src="<?php echo get_sub_field('image',$post->ID);?>" />
              </a>
            </div>
            <?php } ?>
            <div class="content">
              <h3><a href="<?php echo esc_url( $link_url ); ?>">
                <?php echo get_sub_field('heading',$post->ID);?></a>
              </h3>
              <p><?php echo get_sub_field('content',$post->ID);?></p>
              <?php if( $retail_r_link ): ?>
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
  </section>
</main>
<?php get_footer();?>