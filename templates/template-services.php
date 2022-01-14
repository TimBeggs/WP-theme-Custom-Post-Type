<?php
  /**
   * Template Name: Services
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
<?php if (get_field('serv_content_sec_one_heading') != '' || get_field('content_sec_one_content') != '') {?>
<section class="c-serv-content-one pb-0">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-sm-12 col-md-9 col-lg-9 text-center">
        <h2>
          <?php echo get_field('serv_content_sec_one_heading',$post->ID);?>
        </h2>
        <p class="mt-4"> <?php echo get_field('content_sec_one_content',$post->ID);?></p>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<?php if (get_field('content_servpg_services') != '') {?>
<section class="c-service-pg">
  <div class="container services-order-list">

      <?php
        // check if the repeater field has rows of data
        if( have_rows('content_servpg_services',$post->ID) ):
           // loop through the rows of data
          while ( have_rows('content_servpg_services',$post->ID) ) : the_row();

          $learn_link_btn = get_sub_field('button');
          $link_url= '';
          if( $learn_link_btn ){ 
              $link_url = $learn_link_btn['url'];
              $link_title = $learn_link_btn['title'];
              $link_target = $learn_link_btn['target'] ? $learn_link_btn['target'] : '_self';
            }
            $no_image = (get_sub_field('image', $post->ID) == '') ? 0 : 1;
            $class_name = (get_sub_field('image', $post->ID) == '') ? 'col-xl-10 text-center':'col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6 col-order-text';
      ?>
          <div class="row pb-md-5 pb-4 align-items-center">
            <?php if ($no_image > 0) {?>
            <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6 col-order-img">
              <a href="<?php echo esc_url( $link_url ); ?>">
              <img src="<?php echo get_sub_field('image',$post->ID);?>" alt="">
              </a>
            </div>
            <?php } ?>
            <div class="<?php echo $class_name;?>">
              <div class="module-content">
                <h3><?php echo get_sub_field('heading',$post->ID);?></h3>
                <p><?php echo get_sub_field('content',$post->ID);?></p>
                <?php if( $learn_link_btn ): ?>
                <a class="btn-theme" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
      <?php 
        endwhile;
        else :
        // no rows found
        endif;?>
  </div>
</section>
<?php } ?>
<?php get_template_part( 'template-parts/lets-talk' ); ?>

<?php if (get_field('serv_content_sec_two_heading',$post->ID) != '') {?>
<section class="c-ab-content-md-four bg-gray-light">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h2><?php echo get_field('serv_content_sec_two_heading',$post->ID);?></h2>
        </div>
      </div>
     <div class="row mt-lg-5 mt-4 services-list justify-content-center">
       <?php
          // check if the repeater field has rows of data
          if( have_rows('service_highlights',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('service_highlights',$post->ID) ) : the_row(); ?>

        <div class="col-xl-4 col-12 col-sm-12 col-md-6 col-lg-4">
           <div class="card-box-shadow">
              <div class="match-height-content">
                <h3>
                   <?php if (get_sub_field('icon') != '') {?>
                   <span class="icon-img">
                    <img src="<?php echo get_sub_field('icon',$post->ID);?>" alt="">
                   </span>
                  <?php } ?>
                   <span class="heading"><?php echo get_sub_field('title',$post->ID);?></span>
                   <div class="clearfix"></div>
                </h3>
                <p><?php echo get_sub_field('content',$post->ID);?></p>
              </div>
              <?php 
              $link = get_sub_field('button');
              if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <a class="btn-theme-transparent mt-lg-4 mt-2" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
           </div>
        </div>

        <?php 
          endwhile;
          else :
            // no rows found
          endif;
        ?>
     </div>
    </div>
</section>
<?php }?>
</main>
<?php get_footer();?>