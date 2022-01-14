<?php
  /**
   * Template Name: Retail Podcast
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
  <section class="c-retail-r-podcasts">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <?php the_content(); ?>
        </div>
      </div>
      <!---------------------PODCAST POSTS---------------->
      <div class="row">
          <div class="col-lg-4">
          <div class="podcastSection">
            <div class="cat-part">
              <p>Categories</p>
              <select class="podcast-select">
                <option value="">All</option>
                <?php
                  $cat_args = array(
                      'taxonomy' => 'podcast-category',
                  );
                  $cats = get_categories($cat_args);

                  foreach($cats as $cat){
                      echo '<option value="' . $cat->slug . '">' . $cat->name . '</option>';
                  }

                ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center services-list mt-4 ajax-load">

        <?php
        $wp_query = new wp_query(
          array(
              'post_type' => 'sophelle-podcast',
              'order' => 'ASC',
              'orderby' => 'post_date',
              'posts_per_page' => 12,
              'post_status' => 'publish',
              'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
            )
          );

        if ( $wp_query->have_posts() ) :
         while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

        <div class="col-xl-4 col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="card-img-box">
            <div class="img">
              <?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){
                ?>
              <figure class="mt-2"><img src="<?php  echo $img[0];?>" alt=""></figure>
              <?php }
              else { ?>
                <figure class="mt-2"><img src="<?php echo get_template_directory_uri()  . '/images/no-image.png' ?>" alt=""></figure>
              <?php }?> 
            </div>
            <div class="content post-content">

              <div class="match-height-content">
                <h3>
                  <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                </h3>
                <p><?php echo wp_trim_words( strip_tags(get_the_content()), 30, '...' );?></p>
              </div>
              <a href="<?php the_permalink();?>" class="btn-theme-transparent mt-3">Learn More</a>
            </div>
          </div>
        </div>

        <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>

        <!-- Pagination //Start -->
        <div class="col-12">
        <div class="c-pagination">
          <nav class="d-pagination-nav pagination" role="navigation">
            <?php
                if (have_posts()):
                   pagination_bar();
                endif; 
             ?>
          </nav>
        </div>
      </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>