<?php
  /**
   * Template Name: Retail Solutions
   *
   * @package WordPress
   * @since 1.0
   */
  ?>
<?php get_header();

  $retail_solutions_obj = get_page_by_path('retail-solutions', OBJECT, 'page');
  $retail_solutions_id = $retail_solutions_obj->ID;
  $retail_solutions_content = $retail_solutions_obj->post_content;

  if(have_posts()) { 
    the_post();
  }
?>
<main id="site-content" role="main">
  <section class="c-retail-r-podcasts">
    <div class="container">
      <!---------------------Solutions POSTS---------------->
      <div class="row">
        <div class="col-lg-12">
          <p>Welcome to Sophelle's Retail Solutions Directory. We've identified thousands of solutions from leading solution providers. This regularly updated directory is free to search and free to list!</p>

          <p>If you’re a retailer, <a href="https://www.sophelle.com/contact-us/">contact us</a> to learn more about selecting the best solution for your needs. Solution providers, <a href="https://www.sophelle.com/contact-us/">contact us</a> if you have a solution to list or if you'd like to make any changes to the directory.</p>
        </div>
      </div>
      <div class="row" >
        <div class="col-lg-4">
          <div class="retailSolutionsSection">
            <div class="cat-part" style="margin-bottom:15px;">
              <p>Solution Type</p>
              <select class="retail-solutions-select">
                <option value="">All</option>
                <?php
                    $cat_args = array(
                    'taxonomy' => 'retail-solutions',
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
        <div class="col-lg-4 ">
          <div class="retailSolutionsSection">
            <div class="cat-part" style="margin-bottom:15px;">
              <p>Search</p>
              <form action="" method = "POST" class = "Object-search-form">
                <input type="text" name = "retail-solution" class = "object-seach-input">
                <span class = "object-search-submit"></span>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 custom-link">
          <div class="retailSolutionsSection">
            <div class="cat-part" style="margin-bottom:15px;">
              <a href=""><span>View all Solution Types</span></a>
            </div>
          </div>
        </div>
      </div> 
      <div class="row justify-content-center services-list mt-12 ajax-load">
                  
        <?php
        if (isset($_POST['retail-solution']) && !empty($_POST['retail-solution'])) {
          $postis = [];
          $searchKey = $_POST['retail-solution'];
          global $wpdb;

          $table1 = $wpdb->prefix . 'postmeta';
          $prepared_state = $wpdb->prepare(
            "SELECT * FROM $table1 WHERE meta_value LIKE %s", '%'.$searchKey.'%');
          
          $results = $wpdb->get_results($prepared_state);

          if($results){
            foreach($results as $result){
              if(!in_array($result->post_id, $postis)) {
                array_push($postis, $result->post_id);
                $solution_logo = get_field('solution_logo', $result->post_id);
                $solution_url = get_field('solution_url', $result->post_id);
                $solution_company_name = get_field('solution_company_name', $result->post_id);
                $solution_name = get_field('solution_name', $result->post_id);
                $solution_type = get_field('solution_type', $result->post_id);
                $solution_description = get_field('solution_description', $result->post_id);
                $solution_company_url = get_field('solution_company_url', $result->post_id);
                if(!empty($solution_name) && !empty($solution_company_name)) { ?>
                  <div class="row mt-12" style="margin-bottom:10px;width:100%;border-radius: 5px;filter: drop-shadow(0px 2px 10px rgba(210, 210, 210, 0.5));background-color: #ffffff;padding: 0;height: 100%;">
                    <div class="col-xl-3 col-123 col-sm-12 col-md-12 col-lg-3" style="flex-direction: column;display: flex;align-self: center;">
                        <div class="img">
                          <?php if ($solution_logo != '' ) { ?>
                            <a target="_blank" href="<?php echo $solution_company_url; ?>" target="_blank"><img style="padding-top:20px;max-width:100px;width:100px;height:auto;" src="/wp-content/uploads/<?php echo $solution_logo ?>" /></a>
                          <?php } ?>
                        </div>
                          <?php if($solution_company_name !== ''){ ?>
                            <div><p> <a target="_blank" href="<?php echo $solution_company_url; ?>" target="_blank"><?php echo $solution_company_name; ?></a></p></div>
                      <?php } ?>
                    </div>
                    <div class="col-xl-4 col-12 col-sm-12 col-md-12 col-lg-4" style="flex-direction: column;display: flex;align-self: center;">
                      <?php if($solution_name !== ''){ ?>
                          <div> <h2 style="font-size:20px;"><a target="_blank" href="<?php echo $solution_url; ?>" target="_blank"><?php echo $solution_name; ?></a></h2></div>
                      <?php } ?>
                      <?php if($solution_type !== ''){ ?>
                          <div><p> <?php echo $solution_type; ?></p></div>
                      <?php } ?>
                    </div>
                    <div class="col-xl-5 col-12 col-sm-12 col-md-12 col-lg-5" style="flex-direction: column;display: flex;align-self: center;">
                      <?php if($solution_description !== ''){ ?>
                          <p> <?php echo $solution_description; ?></p>
                      <?php } ?>
                    </div>
                  </div>
                <?php }
              }
            }
          } else {
            esc_html_e( 'Sorry, no solutions matched your criteria.' );
          }
        } else {
          $wp_query = new wp_query(
            array(
                'post_type' => 'retail-solutions',
                'order' => 'ASC',
                'orderby' => 'post_date',
                'posts_per_page' => 20,
                'post_status' => 'publish',
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
              )
            );
          if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
        
                        $solution_logo = get_field('solution_logo', $post->ID);
                        $solution_url = get_field('solution_url', $post->ID);
                        $solution_company_name = get_field('solution_company_name', $post->ID);
                        $solution_name = get_field('solution_name', $post->ID);
                        $solution_type = get_field('solution_type', $post->ID);
                        $solution_description = get_field('solution_description', $post->ID);
                        $solution_company_url = get_field('solution_company_url', $post->ID);
                        
                        ?>
              <div class="row mt-12" style="margin-bottom:10px;width:100%;border-radius: 5px;filter: drop-shadow(0px 2px 10px rgba(210, 210, 210, 0.5));background-color: #ffffff;padding: 0;height: 100%;">
                <div class="col-xl-3 col-123 col-sm-12 col-md-12 col-lg-3" style="flex-direction: column;display: flex;align-self: center;">
                    <div class="img">
                      <?php if ($solution_logo != '' ) { ?>
                        <a target="_blank" href="<?php echo $solution_company_url; ?>" target="_blank"><img style="padding-top:20px;max-width:100px;width:100px;height:auto;" src="/wp-content/uploads/<?php echo $solution_logo ?>" /></a>
                      <?php } ?>
                    </div>
                      <?php if($solution_company_name !== ''){ ?>
                        <div><p> <a target="_blank" href="<?php echo $solution_company_url; ?>" target="_blank"><?php echo $solution_company_name; ?></a></p></div>
                  <?php } ?>
                </div>
                <div class="col-xl-4 col-12 col-sm-12 col-md-12 col-lg-4" style="flex-direction: column;display: flex;align-self: center;">
                  <?php if($solution_name !== ''){ ?>
                      <div> <h2 style="font-size:20px;"><a target="_blank" href="<?php echo $solution_url; ?>" target="_blank"><?php echo $solution_name; ?></a></h2></div>
                  <?php } ?>
                  <?php if($solution_type !== ''){ ?>
                      <div><p> <?php echo $solution_type; ?></p></div>
                  <?php } ?>
                </div>
                <div class="col-xl-5 col-12 col-sm-12 col-md-12 col-lg-5" style="flex-direction: column;display: flex;align-self: center;">
                  <?php if($solution_description !== ''){ ?>
                      <p> <?php echo $solution_description; ?></p>
                  <?php } ?>
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
        <?php } ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer();?>