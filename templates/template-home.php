<?php
   /**
    * Template Name: Home
    * Template Post Type: post, page
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
<section class="c-banner overlay-theme-bg" style="background: url('<?php echo (get_field('banner_image',$post->ID) != '') ? get_field('banner_image',$post->ID) : '';?>') no-repeat top center/cover;">
  <div class="container">
     <div class="row">
        <div class="col-xl-12 col-12 text-center">
           <div class="banner-body">
              <h1 class="banner-title"><?php echo get_field('banner_title',$post->ID);?></h1>
              <p><?php echo get_field('banner_description',$post->ID);?></p>
              <?php if (get_field('banner_button_text') != '') {?>
              <a href="<?php echo get_field('banner_button_link',$post->ID);?>" class="btn-theme btn-learn-more">
                <?php echo get_field('banner_button_text',$post->ID);?>
              </a>
              <?php } ?>
           </div>
        </div>
     </div>
  </div>
</section>

<?php if (get_field('retailers_logos') != '') {?>
<section class="c-badges bg-gray-light" id="retailers-logos">
  <div class="container">
     <div class="row">
        <div class="col-xl-12 col-12 text-center">
          <?php if (get_field('retailers_heading') != '') {?>
           <p class="pb-1">
            <?php echo get_field('retailers_heading',$post->ID);?>
          </p>
          <?php } ?>
           <div class="owl-carousel owl-theme badges-list d-flex justify-content-between align-items-center mb-0 mt-2 mt-md-4">
             <?php
                // check if the repeater field has rows of data
                if( have_rows('retailers_logos',$post->ID) ):
                // loop through the rows of data
                while ( have_rows('retailers_logos',$post->ID) ) : the_row(); ?>
              <div class="item"><img src="<?php echo get_sub_field('image',$post->ID);?>" alt=""></div>
              <?php 
                endwhile;
                else :
                  // no rows found
                endif;
              ?>
           </div>
        </div>
     </div>
  </div>
</section>
<?php } ?>
<?php if (get_field('content_module_one_heading') != '') {?>
<section class="c-content-module-one">
  <div class="container">
     <div class="row align-items-center">
      <?php 
      $md1_link_btn = get_field('content_module_one_button');
      $link_url= '';
      if( $md1_link_btn ){ 
          $link_url = $md1_link_btn['url'];
          $link_title = $md1_link_btn['title'];
          $link_target = $md1_link_btn['target'] ? $md1_link_btn['target'] : '_self';
        }
       $no_image = (get_field('content_module_one_image', $post->ID) == '') ? 0 : 1;
       $class_name = (get_field('content_module_one_image', $post->ID) == '') ? 'col-xl-12 text-center':'col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6';?>
        <?php if ($no_image > 0) {?>
        <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6">
          <a href="<?php echo esc_url( $link_url ); ?>">
           <img src="<?php echo get_field('content_module_one_image',$post->ID);?>" alt="">
         </a>
        </div>
        <?php } ?>
        <div class="<?php echo $class_name;?>">
           <div class="module-content">
              <h3><?php echo get_field('content_module_one_heading',$post->ID);?></h3>
              <p><?php echo get_field('content_module_one_Content',$post->ID);?></p>
              <?php if( $md1_link_btn ): ?>
                  <a class="btn-theme" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
           </div>
        </div>
     </div>
  </div>
</section>
<?php } ?>
<?php if (get_field('content_module_two_heading') != '') {?>
<section class="c-content-module-two overlay-theme-dark-bg" style="background: url('<?php echo (get_field('content_module_two_image',$post->ID) != '') ? get_field('content_module_two_image',$post->ID) : '';?>') no-repeat top center/cover;" id="consultant-services">
  
  <div class="container">
     <div class="row justify-content-center">
        <div class="col-xl-9 text-center">
           <h2><?php echo get_field('content_module_two_heading',$post->ID);?></h2>
           <p class="mt-4"><?php echo get_field('content_module_two_sub_text',$post->ID);?></p>
        </div>
     </div>
     <div class="row mt-lg-5 mt-3 services-list justify-content-center">
       <?php
          // check if the repeater field has rows of data
          if( have_rows('content_module_two_services',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('content_module_two_services',$post->ID) ) : the_row(); ?>

        <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6">
           <div class="card-box">
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
              <?php 
              $link = get_sub_field('button');
              if( $link ): 
                  $link_url = $link['url'];
                  $link_title = $link['title'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                  <a class="btn-theme-transparent" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
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
<?php } ?>
<?php if (get_field('content_module_three_heading') != '') {?>
<section class="c-content-module-three bg-gray-light">
  <div class="container">
     <div class="row align-items-center">
      <?php
        $md3_btn_link = get_field('content_module_three_button');
        $link_url= '';
        if( $md3_btn_link ){ 
        $link_url = $md3_btn_link['url'];
        $link_title = $md3_btn_link['title'];
        $link_target = $md3_btn_link['target'] ? $link['target'] : '_self';
        }
       $no_image = (get_field('content_module_three_image', $post->ID) == '') ? 0 : 1;
       $class_name = (get_field('content_module_three_image', $post->ID) == '') ? 'col-xl-12 text-center':'col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6';?>
        <?php if ($no_image > 0) {?>
        <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6">
          <a href="<?php echo esc_url( $link_url ); ?>">
           <img src="<?php echo get_field('content_module_three_image',$post->ID);?>" alt="">
          </a>
        </div>
      <?php } ?>
        <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6">
           <div class="module-content">
              <h3><?php echo get_field('content_module_three_heading',$post->ID);?></h3>
              <p><?php echo get_field('content_module_three_content',$post->ID);?></p>
              <?php if( $md3_btn_link ): ?>
                  <a class="btn-theme" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
              <?php endif; ?>
           </div>
        </div>
     </div>
  </div>
</section>
<?php } ?>

<section class="c-content-module-four" id="success-stories">
  <div class="container">
     <div class="row">
        <div class="col-12 text-center">
           <h2><?php echo get_field('content_module_four_heading',$post->ID);?></h2>
        </div>
     </div>
     <div class="row mt-lg-5 mt-4 stories-list justify-content-center">
        <?php
        $no_of_post = (get_field('number_of_post_you_want_to_display',$post->ID) != '') ? get_field('number_of_post_you_want_to_display',$post->ID): 6 ;

        $the_query = new wp_query(
          array(
              'post_type' => 'post',
              'order' => 'DESC',
              'orderby' => 'post_date',
              'posts_per_page' => $no_of_post,
              'post_status' => 'publish',
              'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => 'success-stories'
                )
              )
            )
          );

        if ( $the_query->have_posts() ) :
         while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="col-xl-4 col-12 col-sm-12 col-md-6 col-lg-4">
             <div class="card-img-box">
                <div class="img">
                  <?php  
                  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'hp_images_post_size');
                    if($img!=''){?> 
                    <a href="<?php the_permalink();?>"><img src="<?php  echo $img[0];?>" alt="">
                    </a>
                  <?php }?> 
                </div>
                <div class="content">
                   <h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
                </div>
             </div>
          </div>
        <?php endwhile;
        wp_reset_postdata(); ?>
        <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
     </div>
     <div class="row mt-lg-4 mr-sm-0">
        <div class="col-12 text-center">
        <?php 
        $link = get_field('content_module_four_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn-theme" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
        </div>
     </div>

  </div>
</section>

</main>
<?php get_footer();?>