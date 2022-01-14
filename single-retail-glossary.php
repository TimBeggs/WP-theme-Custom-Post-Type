<?php
   get_header();
   ?>
<main id="site-content" role="main">
   <section class="c-single-blog">
      <div class="container">
         <div class="row">
            <!-- Blog left //Start -->
            <div class="col-xl-8 col-lg-8 col-12 col-sm-12 col-md-7 pr-lg-4">
               <div class="s-blog-post">
                 <?php if(have_posts()):  while ( have_posts() ) : the_post(); ?>
                  <article class="blog-post">
                     <div class="post-title">
                        <h2><?php the_title();?></h2>
                        <!------category--->
                     </div>
                     <div class="post-content">
                        <?php the_content();?>
                     </div>
                  </article>
                  <?php endwhile; else : ?>
                  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                  <?php endif; 
                     ?>
               </div>
                <!-- Post Box //Start -->
                  <div class="pagination-with-thumbnail d-flex mt-5">
                      <?php
                          $next = get_next_post();
                          $prev = get_previous_post();
                          // the previous post title and thumbnail
                          ?>

                          <?php if (!empty($prev)) { ?>
                          <div class="post-box prevPost">
                              <h5>Previous Post</h5>
                              <a href="<?php echo get_permalink( $prev->ID ); ?>">
                              <span class="title"><?php echo apply_filters( 'the_title', $prev->post_title ); ?></span>
                              </a>
                          </div>
                          <?php } ?>
                          <?php
                          // the next post title and thumbnail
                          if (!empty($next)) {
                          ?>
                          <div class="post-box nextPost">
                            <h5 class="text-right">Next Post</h5>
                            <a href="<?php echo get_permalink( $next->ID ); ?>">
                            <span class="title d-block text-right"><?php echo apply_filters( 'the_title', $next->post_title ); ?></span>
                            </a>
                          </div>
                        <?php } ?>
                  </div>
            </div>
            <!-- Right sidebar -->
            <div class="col-xl-4 col-lg-4 col-12 col-sm-12 col-md-5">
               <div class="sphl-sidebar mt-5 mt-md-2">
                  <?php get_sidebar(); ?>
               </div>
            </div>
            <!-- Right sidebar //end -->
         </div>
      </div>
   </section>
</main>
<?php get_footer(); ?>