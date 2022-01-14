<?php
  /**
   * The main blog template file
   *
   * This is the most generic template file in a WordPress theme
   * and one of the two required files for a theme (the other being style.css).
   * It is used to display a page when nothing more specific matches a query.
   * E.g., it puts together the home page when no home.php file exists.
   *
   * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
   *
   * @package WordPress
   * @subpackage Sophelle
   * @since 1.0.0
   */
  
  get_header();
  global $post;
  ?>
<main id="site-content" role="main">
  <section class="c-blog-lists">
    <div class="container">
      <div class="row">
        <!-- Blog left //Start -->
        <div class="col-xl-8 col-lg-8 col-12 col-sm-12 col-md-7 pr-lg-4">
          <div class="blog-lists">
            <!-- Post Box //Start -->
            <?php
              if ( $wp_query->found_posts ) :
                 while($wp_query->have_posts()) : $wp_query->the_post();
                                // update_post_meta(get_the_ID(),'wpb_post_views_count','0');?>
            <article class="blog-post">
              <div class="post-title">
                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              </div>
              <?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){
                ?>
              <figure><a href="<?php the_permalink();?>">
                <img src="<?php  echo $img[0];?>" alt=""></a>
              </figure>
              <?php }?> 
              <div class="post-content">
                <p><?php echo wp_trim_words( strip_tags(get_the_content()), 40, '...' );?></p>
                <a href="<?php the_permalink();?>" class="btn-theme-transparent">Learn More</a>
              </div>
            </article>
            <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; 
              ?>
          </div>
          <!-- Post Box //Start -->
          <!-- Pagination //Start -->
          <div class="c-pagination">
            <nav class="navigation pagination" role="navigation">
              <?php sophelle_pagination(); ?>
            </nav>
          </div>
          <!-- Pagination //end -->
        </div>
        <!-- Right sidebar -->
        <div class="col-xl-4 col-lg-4 col-12 col-sm-12 col-md-5">
          <div class="sphl-sidebar mt-5 mt-md-0">
            <?php get_sidebar(); ?>
          </div>
        </div>
        <!-- Right sidebar //end -->
      </div>
    </div>
  </section>
</main>
<?php
get_footer();