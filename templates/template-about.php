<?php
   /**
    * Template Name: About
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
<?php if (get_field('about_us_pg_heading') != '') {?>
<section class="c-ab-content-md-one">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-12 col-sm-12 col-md-10 col-lg-10">
            <h2 class="text-center">
               <?php echo get_field('about_us_pg_heading',$post->ID);?>
            </h2>
            <p class="mt-4"> <?php echo get_field('about_us_pg_description',$post->ID);?></p>
         </div>
        </div>
   </div>
</section>
<?php } ?>
<section class="c-ab-content-md-two bg-gray-light">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-9 text-center">
           <h2><?php echo get_field('content-sec-two-heading',$post->ID);?></h2>
        </div>
     </div>
      <div class="row mt-3 team-members justify-content-center">
        <ul>
        <?php
        $team_member_query = get_all_team_members();
        if ( $team_member_query->have_posts() ) :
         while ( $team_member_query->have_posts() ) : $team_member_query->the_post(); ?>
          <li>
            <div class="team-content">
              <a href="<?php the_permalink();?>" class="card-content">
              <div class="img">
                <?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){?>
                  <img src="<?php  echo $img[0];?>" alt="">
                <?php }?> 
              </div>
              <div class="member-info">
                <h5 class="title"><?php the_title(); ?></h5>
                <p class="designation"><?php echo get_field('team_member_designation',$post->ID);?></p>
              </div>
              </a>
            </div>
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

<?php if (get_field('content_ab_sec_four_services') != '') {?>
<section class="c-ab-content-md-four abt-pg-serv-list">
    <div class="container">
     <div class="row services-list justify-content-center">
       <?php
          // check if the repeater field has rows of data
          if( have_rows('content_ab_sec_four_services',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('content_ab_sec_four_services',$post->ID) ) : the_row(); ?>

        <div class="col-xl-4 col-12 col-sm-12 col-md-4 col-lg-4">
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
<?php }?>

<?php if (get_field('consultant_team_sec') != '') {?>
<section class="c-ab-consultant-team bg-gray-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 text-center">
           <h2><?php echo get_field('consultant_team_sec_heading',$post->ID);?></h2>
           <p class="mt-3"><?php echo get_field('consultant_team_sec_sub_text',$post->ID);?></p>
        </div>
     </div>
     <div class="row team-members justify-content-center">
      <ul>
       <?php
          // check if the repeater field has rows of data
          if( have_rows('consultant_team_sec',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('consultant_team_sec',$post->ID) ) : the_row(); ?>

          <li>
            <div class="card-content">
              <div class="img">
                 <?php if (get_sub_field('image') != '') {?>
                  <img src="<?php echo get_sub_field('image',$post->ID);?>" alt="">
                <?php }?>
              </div>
              <div class="member-info">
                <h5 class="title"><?php echo get_sub_field('title',$post->ID);?></h5>
                <p class="designation"><?php echo get_sub_field('designation',$post->ID);?></p>
              </div>
            </div>
          </li>

        <?php 
          endwhile;
          else :
            // no rows found
          endif;
        ?>
      </ul>
     </div>
    </div>
</section>
<?php }?>
</main>
<?php get_footer();?>