<?php
/**
 * The template for displaying single team member post.
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
     <section class="c-team-member">
        <div class="container">
            <div class="row s-team-member">
              <?php 
                if(have_posts()):  while ( have_posts() ) : the_post();
                $social_media = get_field('team_member_social_links',$post->ID);
                  ?>

            <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-sm-12">
              <?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){
              ?>
               <figure class="mt-2"><img src="<?php  echo $img[0];?>" alt=""></figure>
              <?php }?> 

              <?php if (count(array_filter($social_media)) > 0) { ?>
              <ul class="tm-member-social d-flex my-2 align-items-center">
                  <li>
                     <h6 class="m-0">Let’s connect</h6>
                  </li>
                  <?php if (!empty($social_media['linkedin'])) { ?>
                    <li>
                      <a target="_blank" href="<?php echo $social_media['linkedin'];?>" 
                        class="linkedin"></a>
                    </li>
                  <?php } ?>
              </ul>
              <?php } ?>
            </div>
            <!-- Blog Right //end -->
             <div class="col-xl-8 col-lg-8 col-md-8 col-12 col-sm-12 pl-lg-5">
                <!-- Post Box //Start -->
                  <div class="c-team-member-details">
                      <h2><?php the_title();?></h2>
                      <h3 class="designation"><?php echo get_field('team_member_designation',$post->ID);?></h3>
                    <div class="post-content mt-3"><?php the_content();?></div>
                  </div>

                <?php endwhile; else : ?>
                    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
            </div>

        </div>
      </div>
    </section>
</main> 

<?php get_footer(); ?>
