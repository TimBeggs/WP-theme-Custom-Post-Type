<?php get_header();
  if(have_posts()) { 
  the_post();
  }?>
  <script>
      
  </script>
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
              <?php
                $url= $_SERVER['REQUEST_URI'];  
                $uri =  explode('/', $url)[3];
              ?>
              <select class="retail-solutions-select">
                <option value="">All</option>
                <?php
                    $cat_args = array(
                    'taxonomy' => 'retail-solutions',
                  );

                  $cats = get_categories($cat_args);
                  foreach($cats as $cat){
                    if ($cat->slug == $uri){
                        echo '<option value="' . $cat->slug . '" selected>' . $cat->name . '</option>';   
                    } else {
                        echo '<option value="' . $cat->slug . '">' . $cat->name . '</option>';   
                    }
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
              <form action="http://localhost/sophelle/retail-solutions/" method = "GET" class = "Object-search-form">
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
        if (isset($_GET['retail-solution']) && !empty($_GET['retail-solution'])) {
          $postis = [];
          $searchKey = $_GET['retail-solution'];
          $query_array = array(
            'post_type' => 'retail_solutions',
            'posts_per_page'   =>20,
            'order' => 'ASC',
            'orderby' => 'solution_company_name',
            'post_status'      => 'publish',
            'meta_query' => array(
              array(
                'value' => $searchKey,
                'compare' => 'LIKE'
              )
            ),
            'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
          );
          $wp_query = new WP_Query($query_array);
          
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
          <div class="col-12">
            <div class="c-pagination">
              <nav class="d-pagination-nav pagination" role="navigation">
              <?php
                echo 'dd';
                $total_pages = $wp_query->max_num_pages;
                echo $total_pages;  
                if ($total_pages > 1){
                  $current_page = max(1, get_query_var('paged'));
                $big = 999999999; // need an unlikely integer
                $arr=array(
                  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                  'format'             => '?page=%#%',
                  'prev_text'       => __('<'),
                  'next_text'       => __('>'),
                  'prev_next'    => True,
                  'type' => 'list',
                  'end_size' => 5,
                  'mid_size' => 5,
                  'total' => $total_pages, // the total number of pages we have
                  //'add_args'=>array('event_type'=>$event_type),
                  'current' => $current_page, // the current page
                  );
              
                  echo $arr['base'];
                  echo paginate_links($arr);
                }
              ?>
              </nav>
            </div>
          </div>
        </div>
        <?php }  else {
            $query_array = array(
                'post_type' => 'retail_solutions',
                'order' => 'ASC',
                'orderby' => 'post_date',
                'posts_per_page' => 20,
                'post_status' => 'publish',
                'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
            );
            if (!empty($uri)) {
                $query_array['tax_query'] = array(
                    array(
                    'taxonomy' => 'retail-solutions',
                    'field' => 'slug',
                    'terms' => $uri
                    ),
                );
            }
            $wp_query = new wp_query($query_array);
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
<?php get_footer(); ?>