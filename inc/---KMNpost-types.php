<?php
/**
 * All custom post type
 *
 * @package WordPress
 * @subpackage Chess Soliciter
 * @since Chess Soliciter 1.0
 */


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
  add_action( 'wp_ajax_get_ajaxLoadMore', 'get_ajaxLoadMore' );
  add_action( 'wp_ajax_get_ajaxLoadPerTag', 'get_ajaxLoadPerTag' );
} else {
  add_action( 'wp_ajax_nopriv_get_webCategories', 'get_webCategories' );
  add_action( 'wp_ajax_nopriv_get_podcastCategories', 'get_podcastCategories' );
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