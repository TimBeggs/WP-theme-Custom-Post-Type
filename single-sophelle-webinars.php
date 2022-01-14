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
            <!-- Post Box //Start -->
            <?php if(have_posts()):  while ( have_posts() ) : the_post();
              $organizer = get_field('organizer', $post->ID);
              $speaker = get_field('speakers', $post->ID);
              $sessionurl = get_field('session_url', $post->ID);
              $price = get_field('price', $post->ID);
                         
              ?>
            <article class="blog-post">
              <div class="post-title">
                <h2><?php the_title();?></h2>
              </div>
              <?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){
                ?>
              <figure><img src="<?php  echo $img[0];?>" alt=""></figure>
              <?php }?> 
              <div class="post-content">
                <?php the_content();?>
                <div class="webinars-info">
                  <?php if($organizer !== ''){ ?>
                  <div class="wb-item d-flex flex-wrap">
                    <h5>Organizer : </h5>
                    <?php echo $organizer; ?>
                  </div>
                  <?php } ?>
                  <?php if($organizer !== ''){ ?>
                  <div class="wb-item d-flex flex-wrap">
                    <h5>Speaker : </h5>
                    <?php echo $speaker; ?>
                  </div>
                  <?php } ?>
                  <?php if($organizer !== ''){ ?>
                  <div class="wb-item d-flex flex-wrap">
                    <h5>Session URL : </h5>
                    <a href="<?php echo $sessionurl; ?>" target="_blank"><?php echo $sessionurl; ?></a>
                  </div>
                  <?php } ?>
                  <?php if($organizer !== ''){ ?>
                  <div class="wb-item d-flex flex-wrap">
                    <h5>Price : </h5>
                    <?php echo $price; ?></h5>
                  </div>
                  <?php } ?>
                </div>
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
              $next = get_previous_post();
              $prev = get_next_post();
              // the previous post title and thumbnail
              ?>
            <?php if (!empty($prev)) { ?>
            <div class="post-box prevPost">
              <?php $prev_img= get_the_post_thumbnail($prev->ID, 'thumbnail');
                $class_name_prev = ($prev_img == '') ? 'w-100':'';
                ?>
              <h5>Previous Post</h5>
              <a href="<?php echo get_permalink( $prev->ID ); ?>">
              <?php if($prev_img!=''){?>
              <span class="img"><?php echo $prev_img ; ?></span>
              <?php }?> 
              <span class="heading <?php echo $class_name_prev;?>"><?php echo apply_filters( 'the_title', $prev->post_title ); ?></span>
              </a>
            </div>
            <?php } ?>
            <?php
              // the next post title and thumbnail
              if (!empty($next)) {
              ?>
            <div class="post-box nextPost">
              <?php $next_img= get_the_post_thumbnail($next->ID, 'thumbnail');
                $class_name_nxt = ($next_img == '') ? 'w-100':'';
                ?>
              <h5 class="text-right">Next Post</h5>
              <a href="<?php echo get_permalink( $next->ID ); ?>">
              <span class="heading <?php echo $class_name_nxt;?>"><?php echo apply_filters( 'the_title', $next->post_title ); ?></span>
              <?php if($next_img!=''){?>
              <span class="img text-right"><?php echo $next_img ; ?>
              </span>
              <?php }?>
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