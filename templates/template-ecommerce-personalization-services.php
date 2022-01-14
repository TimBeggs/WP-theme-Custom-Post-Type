<?php
  /**
   * Template Name: eCommerce Personalization Services
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
  <section class="c-ecom-preso">
    <div class="container">
      <?php if (get_field('ecom_perso_content_sec_one_heading') != '' || get_field('ecom_perso_content_sec_one_content') != '') {?>
      <div class="row justify-content-center align-items-center mb-4 mb-lg-5">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 text-center">
          <h2>
            <?php echo get_field('ecom_perso_content_sec_one_heading',$post->ID);?>
          </h2>
          <p class="mt-4"> <?php echo get_field('ecom_perso_content_sec_one_content',$post->ID);?></p>
        </div>
      </div>
      <?php } ?>

      <?php if (get_field('ecom_perso_content_sec_two_content') != '') {?>
          <?php if (get_field('ecom_perso_content_sec_two_content') != '') {?>
          <div class="row mt-lg-5 mt-3 services-list justify-content-center">
            <?php
              // check if the repeater field has rows of data
              if( have_rows('ecom_perso_content_sec_two_content',$post->ID) ):
              // loop through the rows of data
              while ( have_rows('ecom_perso_content_sec_two_content',$post->ID) ) : the_row();
               ?>
            <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6 mb-">
              <div class="card-box-shadow">
                <h3>
                  <?php if (get_sub_field('icon') != '') {?>
                  <span class="icon-img">
                  <img src="<?php echo get_sub_field('icon',$post->ID);?>" alt="">
                  </span>
                  <?php } ?>
                  <span class="heading"><?php echo get_sub_field('title',$post->ID);?></span>
                  <div class="clearfix"></div>
                </h3>
                <?php echo get_sub_field('content',$post->ID);?>
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
      <?php } ?>

      <?php the_content(); ?>
    </div>
  </section>


</main>
<?php get_footer();?>