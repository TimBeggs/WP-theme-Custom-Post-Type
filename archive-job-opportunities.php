<?php
  /**
   * Template Name: Job Opportunities
   *
   * @package WordPress
   * @since 1.0
   */
  ?>
<?php get_header();

$job_page_obj = get_page_by_path('job-opportunities', OBJECT, 'page');

$job_page_id = $job_page_obj->ID;
$job_page_content = $job_page_obj->post_content;

  if(have_posts()) { 
  the_post();

}?>

<main id="site-content" role="main">
  <section class="c-job-lists">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-12 col-sm-12 col-md-7 pr-lg-4">
          <?php if (get_field('job_content_sec_one',$job_page_id) != '' ) { ?>
          <?php echo get_field('job_content_sec_one',$job_page_id);?>
          <?php }?>
          <div class="card-box-shadow my-4">
            <h3>Latest job posts:</h3>
            <div class="sphl-latest-jobs">
              <ul class="mb-0">
                <?php
                  $lates_job_query = get_all_latest_jobs(10);
                  if ( $lates_job_query->have_posts() ) :
                   while ( $lates_job_query->have_posts() ) : $lates_job_query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink();?>" class="job-title"><?php the_title(); ?></a>
                </li>
                <?php endwhile;
                  wp_reset_postdata(); ?>
                <?php else:  ?>
                <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        <?php if (get_field('job_content_sec_submit_resume', $job_page_id) != '' ) { ?>
          <div class="card-theme-box">
            <?php echo get_field('job_content_sec_submit_resume',$job_page_id);?>
          </div>
        <?php }?>
        </div>
        <div class="col-xl-4 col-lg-4 col-12 col-sm-12 col-md-5">
            <?php if (get_field('job_content_sidebar_top', $job_page_id) != '' ) { ?>
            <div class="card-gray-box">
              <?php echo get_field('job_content_sidebar_top',$job_page_id);?>
            </div>
            <?php }?>
          <div class="sphl-sidebar mt-4">
            <?php get_template_part( 'template-parts/contact-info-box' ); ?>
          </div>
        </div>

        <div class="col-lg-12">
          <?php echo $job_page_content ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer();?>