<?php
   /**
    * Template Name: Client Page
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
<section class="c-cl-sec-one">
  <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 text-center">
          <h2>
             <?php echo get_field('client_sec_one_heading',$post->ID);?>
          </h2>
          <p class="mt-4"> <?php echo get_field('client_sec_one_content',$post->ID);?></p>
        </div>
      </div>
      <div class="row mt-lg-5 mt-4 services-list justify-content-center">
       <?php
          // check if the repeater field has rows of data
          if( have_rows('client_sec_one_we_serve',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('client_sec_one_we_serve',$post->ID) ) : the_row(); ?>

        <div class="col-xl-4 col-12 col-sm-12 col-md-6 col-lg-4">
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
              <p><?php echo get_sub_field('content',$post->ID);?></p>
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
<section class="c-cl-section-two bg-gray-light">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-sm-12 col-md-9 col-lg-9 text-center">
        <h2>
           <?php echo get_field('client_sec_two_heading',$post->ID);?>
        </h2>
        <p class="mt-4"> <?php echo get_field('client_sec_two_content',$post->ID);?></p>
      </div>
    </div>
    <div class="row justify-content-center align-items-center clients-list">
      <?php
        $terms = get_terms([
          'taxonomy' => 'featued-client-category',
          'hide_empty' => true,
        ]);
        if(!empty($terms)){
        echo "<div id='list-cat-buttons' class='cat-buttons my-4'>";
        echo "<a href='javascript:void(0)' class='active btn-theme-transparent client-cat-btn' data-cat='all'>All</a>";
        foreach($terms as $term) { ?>
          <a href="javascript:void(0)" class="btn-theme-transparent" 
          data-cat="<?php echo $term->slug ?>">
            <?php echo $term->name ?>
          </a>
        <?php }
        echo "</div>";
      }?>
      <ul class="mb-0 mt-3 p-0" id="cat-list-gallery">
      <?php
        $featured_client_query = get_all_featured_client();
        if ( $featured_client_query->have_posts() ) :
         while ( $featured_client_query->have_posts() ) : $featured_client_query->the_post();
          $categories= [];
          $terms = wp_get_post_terms( $post->ID, 'featued-client-category' );
            foreach ( $terms as $term ) {
              $categories[] = $term->slug;
            }
          ?>
          <li class="item <?php echo implode(' ', $categories);?>">
              <a 
              href="<?php echo get_field('client_details_url',$post->ID);?>" class="card-box-shadow" target="_blank">
              <div class="img">
                <?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){?>
                  <img src="<?php  echo $img[0];?>">
                <?php }?> 
              </div>
              <h5 class="title"><?php the_title(); ?></h5>
              </a>
          </li>
        <?php endwhile;
        wp_reset_postdata(); ?>
        <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </ul>
    </div>
  </div>
</section>
<?php get_template_part( 'template-parts/lets-talk' ); ?>

<section class="c-cl-sec-testimonial">
  <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-9 col-lg-9 text-center">
          <h2>
             <?php echo get_field('client_sec_testimonial_heading',$post->ID);?>
          </h2>
          <div class="testimonia-hd-line"><span class="icon"></span></div>
         <?php echo get_field('client_sec_testimonial_content',$post->ID);?>
       </div>
    </div>
  </div>
</section>
</main>
<?php get_footer();?>