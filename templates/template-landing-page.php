<?php
   /**
    * Template Name: Landing Page
    *
    * @package WordPress
    * @since 1.0
    */
?>
<?php get_header();
   if(have_posts()) { 
   the_post();
  }

  $lp_solid_bg = (get_field('lp_background_image',$post->ID) != '') ? 'url('. get_field('lp_background_image',$post->ID).') no-repeat top center/cover' : '#f8f8f8';

?>

<main id="site-content" role="main">
  <section class="c-lp-banner overlay-theme-bg" 
    style="background:<?php echo $lp_solid_bg;?>">
    <div class="container"> 
      <div class="row align-items-center">
        <div class="col-lg-7 col-12 pr-lg-4">
          <div class="lp-left-part match-height-content">
            <?php echo get_field('lp_left_content',$post->ID);?>
            <div class="lp-form contact-form">
              <?php echo do_shortcode(get_field('lp_contact_form_shortcode',$post->ID));?>
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-12 pl-md-4 mt-5 mt-lg-0">
          <div class="lp-right-part match-height-content text-center">
            <img src="<?php echo get_field('lp_right_image',$post->ID);?>">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>