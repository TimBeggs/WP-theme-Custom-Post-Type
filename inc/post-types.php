<?php
/**
 * All custom post type
 *
 * @package WordPress
 * @subpackage Chess Soliciter
 * @since Chess Soliciter 1.0
 */

// Sophelle Retail Solutions Post Type
function create_sophelle_retail_solutions_post_type () {
    register_post_type( 'retail_solutions',
    // CPT Options
        array(
            'labels' => array(
                'name' => 'Retail Solutions',
                'singular_name' => 'Retail Solution' 
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'retail_solutions'),
            'show_in_rest' => true,
            'taxonomies' => array( 'retail_solutions' ),
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'can_export'          => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page', 
        )
    );  
}

add_action('init', 'create_sophelle_retail_solutions_post_type');

// function create_sophelle_retail_solution_categories () {
// 	register_taxonomy(
// 	  'retail_solution_category',
// 	  'retail-solutions',
// 	  array(
// 	    'label' => __('Categories'),
// 	    'hierarchical' => true
// 	  )
// 	);
// }

function create_sophelle_retail_solution_categories () {
	register_taxonomy(
	  'retail-solutions',
	  'retail_solutions',
	  array(
	    'label' => __('Categories'),
	    'hierarchical' => true	
	  )
	);
}

add_action('init', 'create_sophelle_retail_solution_categories');

function get_all_sophelle_retail_solutions($posts_per_page = '-1'){
  $sophelle_retail_solutions_args = array( 'post_type' => 'retail-solutions', 'posts_per_page' => $posts_per_page );
  $sophelle_retail_solutions_query = new WP_Query( $sophelle_retail_solutions_args ); 
  return $sophelle_retail_solutions_query;
}

// Sophelle Retail Solutions Post Type End//

// Sophelle Webinars Post Type
function create_sophelle_webinar_post_type () {
	register_post_type('sophelle-webinars',
	  array(
	    'labels' => array(
	      'name'          => 'Sophelle Webinars',
	      'singular_name' => 'Sophelle Webinar',
	      'add_new_item'  => 'Add New Sophelle Webinar',
	      'edit_item'     => 'Edit Sophelle Webinar'
	    ),
	    'public' => true,
      'has_archive' => true,
      'publicly_queryable'  => true,
	    'menu_icon' => 'dashicons-admin-site-alt3',
	    'supports' => array(
	      'title',
	      'revisions',
	      'thumbnail',
	      'editor'
	    )
	  )
	);
}
add_action('init', 'create_sophelle_webinar_post_type');

function create_sophelle_webinar_categories () {
	register_taxonomy(
	  'webinar_category',
	  'sophelle-webinars',
	  array(
	    'label' => __('Categories'),
	    'hierarchical' => true
	  )
	);
}
add_action('init', 'create_sophelle_webinar_categories');

function create_sophelle_webinar_organizer () {
	register_taxonomy(
	  'webinar_organizer',
	  'sophelle-webinars',
	  array(
	    'label' => __('Organizer'),
	    'hierarchical' => true
	  )
	);
}
add_action('init', 'create_sophelle_webinar_organizer');

// Sophelle Webinars Post Type End//

// Sophelle Podcast Post Type
function create_sophelle_podcast_post_type () {
	register_post_type('sophelle-podcast',
	  array(
	    'labels' => array(
	      'name'          => 'Sophelle Podcasts',
	      'singular_name' => 'Sophelle Podcast',
	      'add_new_item'  => 'Add New Sophelle Podcast',
	      'edit_item'     => 'Edit Sophelle Podcast'
	    ),
	    'public' => true,
      'has_archive' => true,
      'publicly_queryable'  => true,
	    'menu_icon' => 'dashicons-controls-volumeon',
	    'supports' => array(
	      'title',
	      'revisions',
	      'thumbnail',
	      'editor'
	    )
	  )
	);
}
add_action('init', 'create_sophelle_podcast_post_type');

function create_sophelle_podcast_categories () {
	register_taxonomy(
	  'podcast-category',
	  'sophelle-podcast',
	  array(
	    'label' => __('Categories'),
	    'hierarchical' => true
	  )
	);
}
add_action('init', 'create_sophelle_podcast_categories');

function get_all_sophelle_podcasts($posts_per_page = '-1'){
  $sophelle_podcast_args = array( 'post_type' => 'sophelle-podcast', 'posts_per_page' => $posts_per_page );
  $sophelle_podcast_query = new WP_Query( $sophelle_podcast_args ); 
  return $sophelle_podcast_query;
}
// Sophelle Podcast Post Type End//

// Sophelle Glossary Post Type
function create_retail_glossary_post_type () {
	register_post_type('retail-glossary',
	  array(
	    'labels' => array(
	      'name'          => 'Sophelle Glossary',
	      'singular_name' => 'Sophelle Glossary',
	      'add_new_item'  => 'Add New Sophelle Glossary',
	      'edit_item'     => 'Edit Sophelle Glossary'
	    ),
	    'public' => true,
      'has_archive' => true,
      'publicly_queryable'  => true,
	    'menu_icon' => 'dashicons-list-view',
	    'supports' => array(
	      'title',
	      'revisions',
	      'thumbnail',
	      'editor'
	    )
	  )
	);
}
add_action('init', 'create_retail_glossary_post_type');

function get_all_retail_glossary($posts_per_page = '-1'){
  $retail_glossary_args = array( 'post_type' => 'retail-glossary', 'posts_per_page' => $posts_per_page );
  $retail_glossary_query = new WP_Query( $retail_glossary_args ); 
  return $retail_glossary_query;
}
// Sophelle Glossary Type End//

// Team Members Post Type Start//
function create_team_members_post_type () {

	register_post_type('team-member',
	  array(
	    'labels' => array(
	      'name'          => 'Team Members',
	      'singular_name' => 'Team Member',
	      'add_new_item'  => 'Add New Team Member',
	      'edit_item'     => 'Edit Team Member'
	    ),
	    'public' => true,
      'has_archive' => true,
      'publicly_queryable'  => true,
	    'menu_icon' => 'dashicons-groups',
	    'supports' => array(
	      'title',
	      'revisions',
	      'thumbnail',
	      'editor'
	    )
	  )
	);
}
add_action('init', 'create_team_members_post_type');

function create_team_members_categories () {
	register_taxonomy(
	  'team-member-category',
	  'team-member',
	  array(
	    'label' => __('Categories'),
	    'hierarchical' => true
	  )
	);
}
add_action('init', 'create_team_members_categories');

function get_all_team_members($posts_per_page = '-1'){
  $team_args = array(
   'post_type' => 'team-member',
   'posts_per_page' => $posts_per_page 
 );
  $team_member_query = new WP_Query( $team_args ); 
  return $team_member_query;
}

// Team Members Post Type End//

// Latest Job Post Type Start//
function create_latest_jobs_post_type () {
	register_post_type('job-opportunities',
	  array(
	    'labels' => array(
	      'name'          => 'Jobs',
	      'singular_name' => 'Job',
	      'add_new_item'  => 'Add New Job',
	      'edit_item'     => 'Edit Job'
	    ),
	    'public' => true,
      'has_archive' => true,
      'publicly_queryable'  => true,
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'supports' => array(
	      'title',
	      'revisions',
	      'thumbnail',
	      'editor'
	    )
	  )
	);
}
add_action('init', 'create_latest_jobs_post_type');

// function create_latest_jobs_categories () {
// 	register_taxonomy(
// 	  'job-opportunitiess-category',
// 	  'job-opportunitiess',
// 	  array(
// 	    'label' => __('Categories'),
// 	    'hierarchical' => true
// 	  )
// 	);
// }
// add_action('init', 'create_latest_jobs_categories');
function get_all_latest_jobs($posts_per_page = '-1'){
  $jobs_args = array( 'post_type' => 'job-opportunities', 'posts_per_page' => $posts_per_page );
  $jobs_query = new WP_Query( $jobs_args ); 
  return $jobs_query;
}

// Latest Job Post Type End//


// Featured Client Post Type Start//
function create_client_post_type () {
	register_post_type('featured-client',
	  array(
	      'labels' => array(
	      'name'          => 'Clients',
	      'singular_name' => 'Client',
	      'add_new_item'  => 'Add New Client',
	      'edit_item'     => 'Edit Client'
	    ),
	    'public' => true,
      	'has_archive' => true,
      	'publicly_queryable'  => true,
	    'menu_icon' => 'dashicons-buddicons-buddypress-logo',
	    'supports' => array(
	      'title',
	      'revisions',
	      'thumbnail',
	      'editor'
	    )
	  )
	);
}
add_action('init', 'create_client_post_type');


function create_client_categories () {
	register_taxonomy(
		'featued-client-category',
		'featured-client',
		array(
		'label' => __('Categories'),
		'hierarchical' => true
		)
	);
}
 add_action('init', 'create_client_categories');


function get_all_featured_client($posts_per_page = '-1'){
  $clients_args = array( 'post_type' => 'featured-client', 'posts_per_page' => $posts_per_page,'orderby'=>'title','order'=>'ASC');
  $clients_query = new WP_Query( $clients_args ); 
  return $clients_query;
}

// Featured Client Post Type End//

// Ajax started for webinars and podcasts//

if ( is_user_logged_in() ){
  add_action( 'wp_ajax_get_webCategories', 'get_webCategories' );
  add_action( 'wp_ajax_get_podcastCategories', 'get_podcastCategories' );
  add_action( 'wp_ajax_get_retailSolutionsCategories', 'get_retailSolutionsCategories' );
  add_action( 'wp_ajax_get_ajaxLoadMore', 'get_ajaxLoadMore' );
  add_action( 'wp_ajax_get_ajaxLoadPerTag', 'get_ajaxLoadPerTag' );
} else {
  add_action( 'wp_ajax_nopriv_get_webCategories', 'get_webCategories' );
  add_action( 'wp_ajax_nopriv_get_retailSolutionsCategories', 'get_retailSolutionsCategories' );
  add_action( 'wp_ajax_nopriv_get_ajaxLoadMore', 'get_ajaxLoadMore' );
  add_action( 'wp_ajax_nopriv_get_ajaxLoadPerTag', 'get_ajaxLoadPerTag' );
}


function get_webCategories(){
	header("Content-Type: text/html");

	$catSlug = $_POST['catSlug'];  
	$orgSlug = $_POST['orgSlug'];  
	if($orgSlug != '' && $catSlug != '') {
	$oparator = 'AND';
	}
	else {
	$oparator = 'OR';
	}
  $tax_query = [];
  $query_array = array(
    'post_type' => 'sophelle-webinars',
    'order' => 'DESC',
    'orderby' => 'post_date',
    'posts_per_page' => -1,
    'post_status' => 'publish'
  );

  if (!empty($catSlug)) {
    array_push($tax_query, array(
      'taxonomy' => 'webinar_category',
      'field' => 'slug',
      'terms' => $catSlug
    ));
  }

  if (!empty($orgSlug)) {
    array_push($tax_query, array(
      'taxonomy' => 'webinar_organizer',
      'field' => 'slug',
      'terms' => $orgSlug
    ));
  }

  if (!empty($tax_query)) {
    $query_array['tax_query'] = array(
      'relation' => $oparator,
      $tax_query
    );
  }


  $wp_query = new wp_query($query_array);

  if ( $wp_query->have_posts() ) :
   while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>
			
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
              <h3>
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
              </h3>
              <p><?php echo wp_trim_words( strip_tags(get_the_content()), 30, '...' );?></p>
              <a href="<?php the_permalink();?>" class="btn-theme-transparent">Learn More</a>
            </div>
          </div>
        </div>

        <?php endwhile; else : ?>
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


        <!-- Pagination //Start -->
		
<?php
    exit();
}


function get_podcastCategories(){
  header("Content-Type: text/html");

	$catSlug = $_POST['catSlug'];   
	$query_array = array(
	'post_type' => 'sophelle-podcast',
	'order' => 'DESC',
	'orderby' => 'post_date',
	'posts_per_page' => -1,
	'post_status' => 'publish'
	);

	if (!empty($catSlug)) {
	$query_array['tax_query'] = array(
		array(
		'taxonomy' => 'podcast-category',
		'field' => 'slug',
		'terms' => $catSlug
		),
	);
	}

	$wp_query = new wp_query($query_array);


	if ( $wp_query->have_posts() ) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>
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
			<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
			<p><?php echo wp_trim_words( strip_tags(get_the_content()), 30, '...' );?></p>
			<a href="<?php the_permalink();?>" class="btn-theme-transparent">Learn More</a>
		</div>
	</div>
</div>

	<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
<?php
    exit();
}


function get_retailSolutionsCategories(){
  	header("Content-Type: text/html");

	$catSlug = $_POST['catSlug'];   
	$query_array = array(
		'post_type' => 'retail_solutions',
		'order' => 'ASC',
		'orderby' => 'solution_company_name',
		'posts_per_page' => 20,
		'post_status' => 'publish',
		'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
	);
	if (!empty($catSlug)) {
		$query_array['tax_query'] = array(
			array(
			'taxonomy' => 'retail-solutions',
			'field' => 'slug',
			'terms' => $catSlug
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
			</div>
		<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
	<div class="col-12">
		<div class="c-pagination">
			<nav class="d-pagination-nav pagination" role="navigation">
			<?php
				$total_pages = $wp_query->max_num_pages;
				if ($total_pages > 1){
					$current_page = max(1, get_query_var('paged'));
				$big = 999999999; // need an unlikely integer
				$arr=array(
					'base' => 'http://localhost/sophelle/retail-solutions/'.$catSlug.'/page/%#%/',
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
<?php
    exit();
}

function get_ajaxLoadMore(){
  	header("Content-Type: text/html");
	$live_termid = $_POST['live_termid']; 
	$par_page = $_POST['par_page']; 
	$live_page = $_POST['live_page']; 

	$tempPage = $live_page + $par_page;

	if($live_termid == '')
		$live_termid = get_field('tag_list', 73);

	$arr = array(
		'post_type' => 'post',
		'post_status' => 'publish', 
		'posts_per_page' => $tempPage,
		'tag__in' => $live_termid,
	);
	
	$wp_query= NULL;
	$wp_query = new WP_Query( $arr );

	while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>        
	<li class="item <?php echo implode(' ', $tags);?>">
		<div class="card-img-box">
		<div class="img">
			<?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){?>
				<a href="<?php the_permalink();?>">
			<img src="<?php  echo $img[0];?>" alt="">
			</a>
			<?php }?> 
		</div>
		<div class="content">
			<h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
		</div>
		</div>
	</li>
 <?php
	endwhile;
	wp_reset_query();
  
  
  	exit();
}


function get_ajaxLoadPerTag(){
  	header("Content-Type: text/html");
	$tempTermID = '';
	$termID = $_POST['termID']; 
// 	$par_page = $_POST['par_page']; 
// 	$live_page = $_POST['live_page']; 

// 	$tempPage = $live_page + $par_page;

	if($termID == '')
		$tempTermID = get_field('tag_list', 73);
	else
		$tempTermID = $termID;

	$arr = array(
		'post_type' => 'post',
		'post_status' => 'publish', 
		'posts_per_page' => 6,
		'tag__in' => $tempTermID,
	);
	
	$wp_query= NULL;
	$wp_query = new WP_Query( $arr );
	$totalPost = $wp_query->found_posts;
	echo '<ul class="d-flex flex-wrap p-0 mt-3 justify-content-center w-100" id="cat-list-gallery" live-termID="'. $tempTermID .'" total-post="'. $totalPost .'" par-page="6">';

	while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
?>        
 	<li class="item <?php echo implode(' ', $tags);?>">
 		<div class="card-img-box">
 		<div class="img">
 			<?php  $img= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full');  if($img!=''){?>
 				<a href="<?php the_permalink();?>">
 			<img src="<?php  echo $img[0];?>" alt="">
 			</a>
 			<?php }?> 
 		</div>
 		<div class="content">
 			<h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
 		</div>
 		</div>
 	</li>
  <?php
 	endwhile;
 	wp_reset_query();
	echo '</ul>';
  
  
  	exit();
}