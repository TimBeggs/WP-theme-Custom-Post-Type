<?php
/**
 * Sophelle functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Sophelle
 * @since 1.0.0
 */
/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
/**
 * Register and Enqueue Styles.
 */

add_theme_support( 'post-thumbnails' );
	// Set post thumbnail size.
	set_post_thumbnail_size( 1200, 9999 );

	// Add custom image size used in Cover Template.
	add_image_size( 'twentytwenty-fullscreen', 1980, 9999 );

	// Custom logo.
	$logo_width  = 120;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	add_theme_support(
		'custom-logo',
		array(
			'height'      => $logo_height,
			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);
function sophelle_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}
function sophelle_register_styles() {

	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'owl-carousel-css', get_stylesheet_directory_uri().'/css/owl.carousel.css', array(), $theme_version );
	wp_enqueue_style( 'owl-theme-css', get_stylesheet_directory_uri().'/css/owl.theme.default.min.css', array(), $theme_version );
	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri().'/css/bootstrap.min.css', array(), $theme_version );
	wp_enqueue_style( 'font-family-css', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap', array(), $theme_version );
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri().'/css/custom-style.css?v='.time());
}

add_action( 'wp_enqueue_scripts', 'sophelle_register_styles' );

/**
 * Register and Enqueue Scripts.
 */
function sophelle_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_script( 'jquery3.4.1-js', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), $theme_version, false );
	wp_enqueue_script( 'owl-carousel-js', get_stylesheet_directory_uri().'/js/owl.carousel.js', array(), $theme_version, false );
	wp_enqueue_script( 'match-height', get_stylesheet_directory_uri().'/js/match-height.js', array(), $theme_version, false );
 	wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js?v='.time());
}

add_action( 'wp_enqueue_scripts', 'sophelle_register_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */


/** Enqueue non-latin language styles
 *
 * @since 1.0.0
 *
 * @return void
 */


/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function sophelle_menus() {

	$locations = array(
		'primary'  => __( 'Main Menu', 'sophelle' ),
		'mobile'   => __( 'Mobile Menu', 'sophelle' ),
		'footer'   => __( 'Footer Menu', 'sophelle' ),
		'social'   => __( 'Social Menu', 'sophelle' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'sophelle_menus' );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sophelle_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h3 class="widget-title subheading title-w-divider">',
		'after_title'   => '</h3>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Blog side Bar.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Blog Sidebar', 'sophelle' ),
				'id'          => 'blog-sidebar',
				'description' => __( 'Widgets in this area will be displayed in the blog page.', 'sophelle' ),
			)
		)
	);
			// Single Blog side Bar.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Blog Details Sidebar', 'sophelle' ),
				'id'          => 'blog-details-sidebar',
				'description' => __( 'Widgets in this area will be displayed in the blog details page.', 'sophelle' ),
			)
		)
	);

		// Top Search Bar.
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Header Seacrh', 'sophelle' ),
				'id'          => 'header-top-search',
				'description' => __( 'Widgets in this area will be displayed in the header.', 'sophelle' ),
			)
		)
	);

	// Webinars Sidebar
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Webinar Sidebar', 'sophelle' ),
				'id'          => 'webinar-sidebar',
				'description' => __( 'Widgets in this area will be displayed in the Webinars details pages.', 'sophelle' ),
			)
		)
	);

	// Podcasts Sidebar
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Podcast Sidebar', 'sophelle' ),
				'id'          => 'podcast-sidebar',
				'description' => __( 'Widgets in this area will be displayed in the Podcasts details pages.', 'sophelle' ),
			)
		)
	);

}

add_action( 'widgets_init', 'sophelle_sidebar_registration' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
//Remove editor from pages
function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'templates/template-services.php':
            case 'templates/template-contact-us.php':
            case 'templates/template-services-child.php':
            case 'templates/template-jobs.php':
            case 'templates/template-clients.php':
            case 'templates/template-retail-resources.php':
            case 'templates/template-case-studies.php':
            case 'templates/template-newsletter.php':
            // the below removes 'editor' support for 'pages'
            remove_post_type_support('page', 'editor');
            break;
            default :
            // Don't remove any other template.
            break;
        }
    }
}
add_action('init', 'remove_editor');

//Pagination
function pagination_bar() {
    global $wp_query;
    $total_pages = $wp_query->max_num_pages;
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
}

function sophelle_pagination( $range = 5 ) {
		// $paged - number of the current page
		global $paged, $wp_query;
		// How much pages do we have?
		$max_page = $wp_query->max_num_pages;
		// We need the pagination only if there is more than 1 page
		if ( $max_page > 1 )
			if ( !$paged ) $paged = 1;
	
		$active_class_first = ($paged == 1) ? 'active': '';
		$active_class_last = ($paged == $max_page) ? 'active': '';

		echo "\n".'<ul class="pagination">'."\n";
			// On the first page, don't put the First page link
				echo '<li class="page-num page-num-first '.$active_class_first.'"><a href='.get_pagenum_link(1).' class="btn-theme-transparent">'.__('First').' </a></li>';
		
			// To the previous page
			echo '<li class="page-num page-num-prev">';
				previous_posts_link(' < '); // «
			echo '</li>';
		
			// We need the sliding effect only if there are more pages than is the sliding range
			if ( $max_page > $range ) :
  				// When closer to the beginning
  				if ( $paged < $range ) :
  					for ( $i = 1; $i <= ($range + 1); $i++ ) {
  						$class = $i == $paged ? 'current' : '';
  						echo '<li class="page-num pg-number"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
  					}
  				// When closer to the end
  				elseif ( $paged >= ( $max_page - ceil($range/2)) ) :
  					for ( $i = $max_page - $range; $i <= $max_page; $i++ ){
  						$class = $i == $paged ? 'current' : '';
  						echo '<li class="page-num pg-number"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
  					}
    			// Somewhere in the middle
    			elseif ( $paged >= $range && $paged < ( $max_page - ceil($range/2)) ) :
    				for ( $i = ($paged - ceil($range/2)); $i <= ($paged + ceil($range/2)); $i++ ) {
    						$class = $i == $paged ? 'current' : '';
    					echo '<li class="page-num pg-number"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
    				}
          endif;
			// Less pages than the range, no sliding effect needed
			else :
				for ( $i = 1; $i <= $max_page; $i++ ) {
					$class = $i == $paged ? 'current' : '';
					echo '<li class="page-num pg-number"><a class="paged-num-link '.$class.'" href="'.get_pagenum_link($i).'"> '.$i.' </a></li>';
				}
			endif;
		
			// Next page
			echo '<li class="page-num page-num-next">';
				next_posts_link('>'); // »
			echo '</li>';

			// On the last page, don't put the Last page link
				echo '<li class="page-num page-num-last '.$active_class_last.'"><a href='.get_pagenum_link($max_page).' class="btn-theme-transparent"> '.__('Last').'</a></li>';
	
		echo "\n".'</ul>'."\n";
}
//END pagination

// Custom Function.
require get_template_directory() . '/inc/post-types.php';


//Airpress Table 

function airpress_data_shortcode() {
    $fieldname = $_REQUEST['sort'];
          $ordertype = $_REQUEST['type'];
          $query = new AirpressQuery();
          $query->setConfig("Trade Config");
          $query->table("Table 1");
          if($fieldname !=''){
          $query->sort($fieldname,$ordertype);
          }else{
            $query->sort("Start Date");
          }
          $trade = new AirpressCollection($query);
          ?>
          <table border="0" cellpadding="0" cellspacing="0" class="tbl_events table-responsive">
          <thead>
          <tr>
          <?php if($ordertype =='desc'){ ?>
            <th colspan="2" width="55%">Conference<a class="asc_order" href="?sort=Conference&type=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></th>
          <?php }elseif($ordertype =='asc'){ ?>
            <th colspan="2" width="55%">Conference<a class="desc_order" href="?sort=Conference&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php }else{ ?>
            <th colspan="2" width="55%">Conference<a class="desc_order" href="?sort=Conference&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php } ?>  
          <?php if($ordertype =='desc'){ ?>
            <th width="15%">Start Date<a class="asc_order" href="?sort=Start Date&type=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></th>
          <?php }elseif($ordertype =='asc'){ ?>
            <th width="15%">Start Date<a class="desc_order" href="?sort=Start Date&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php }else{ ?>
            <th width="15%">Start Date<a class="desc_order" href="?sort=Start Date&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php } ?>  
            <th>End Date</th> 
            <th>Location</th>
          </tr>
          </thead>
          <tbody>
          <?php 
          foreach($trade as $tr){
            //date("n/j/y", strtotime($trsl["Period"]));
             $stdatenew = date("n/j/y", strtotime($tr["Start Date"]));
             $enddatenew = date("n/j/y", strtotime($tr["End Date"]));
            ?>
            <tr>
              <td style="text-align: center;"><?php if($tr["Event Logo"][0][url]){ ?>
              <a href="<?php echo  $tr["URL"]; ?>" target="_blank"><img src='<?php echo $tr["Event Logo"][0][url]; ?>'></a>
            <?php }
             ?></td>
              <td><a href="<?php echo  $tr["URL"]; ?>" target="_blank"><?php echo $tr["Conference"]; ?></a></td>
              <td><?php echo $stdatenew; ?></td>
              <td><?php echo $enddatenew; ?></td>
              <td><?php echo $tr["Location"]; ?></td>
            </tr>

            <?php     
          } 
        ?>
        </tbody>
        </table>

<?php
}
add_shortcode('airpress_data', 'airpress_data_shortcode');


function airpress_retailer_sales_shortcode() {
    $fieldname = $_REQUEST['sort'];
          $ordertype = $_REQUEST['type'];
          $query = new AirpressQuery();
          
          $query->setConfig("Retailer Sales");
          $query->table("Revenue");
          if($fieldname !=''){
          $query->sort($fieldname,$ordertype);
          }else{
          $query->sort('Company','asc');
          }
          $trade_sale = new AirpressCollection($query);
          /* echo "<pre>";
          print_r($trade_sale);
          exit; */
          
          
          ?>
          <table border="0" cellpadding="0" cellspacing="0" class="tbl_events table-responsive">
          <thead>
          <tr>
          <?php if($ordertype =='desc'){ ?>
            <th>Company<a class="asc_order" href="?sort=Company&type=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></th>
          <?php }elseif($ordertype =='asc'){ ?>
            <th>Company<a class="desc_order" href="?sort=Company&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php }else{ ?>
            <th>Company<a class="desc_order" href="?sort=Company&type=asc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php } ?>  
          <?php if($ordertype =='desc'){ ?>
            <th>Ticker<a class="asc_order" href="?sort=Ticker&type=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></th>
          <?php }elseif($ordertype =='asc'){ ?>
            <th>Ticker<a class="desc_order" href="?sort=Ticker&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php }else{ ?>
            <th>Ticker<a class="desc_order" href="?sort=Ticker&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php } ?>
          
          <?php if($ordertype =='desc'){ ?>
            <th>Sales Increase<a class="asc_order" href="?sort=Sales&type=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></th>
          <?php }elseif($ordertype =='asc'){ ?>
            <th>Sales Increase<a class="desc_order" href="?sort=Sales&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php }else{ ?>
            <th>Sales Increase<a class="desc_order" href="?sort=Sales&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php } ?>

          <?php if($ordertype =='desc'){ ?>
            <th>Period<a class="asc_order" href="?sort=Period&type=asc"><i class="fa fa-sort-amount-asc" aria-hidden="true"></i></a></th>
          <?php }elseif($ordertype =='asc'){ ?>
            <th>Period<a class="desc_order" href="?sort=Period&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php }else{ ?>
            <th>Period<a class="desc_order" href="?sort=Period&type=desc"><i class="fa fa-sort-amount-desc" aria-hidden="true"></i></a></th>
          <?php } ?>
          </tr>
        </thead>

        <tbody>
          <?php 
          foreach($trade_sale as $trsl){
            $period = date("n/j/y", strtotime($trsl["Period"]));
            $sale_inc = $trsl["Sales"] * 100;
            $sales_final = round($sale_inc, 1);
            $comp_website = $trsl["Website"];
            $ticker_link = $trsl["Financials"];
            
            ?>
            <tr>
              <td><a href="<?php echo $comp_website; ?>" target="_blank"><?php echo $trsl["Company"]; ?></a></td>
              <td><a href="<?php echo $ticker_link; ?>" target="_blank"><?php echo $trsl["Ticker"]; ?></a></td>
              <td><?php echo $sales_final; ?>%</td>
              <td><?php echo $period; ?></td>
            </tr>

            <?php     
          } 
        ?>
        </tbody>
        </table>

<?php
}
add_shortcode('airpress_retailer_sales', 'airpress_retailer_sales_shortcode');

// Remove success stories from blog page

function get_success_stories_terms_ids () {
  $category = get_term_by( 'slug', 'success-stories', 'category' );
  $category_list = array();
  $args = array(
    'type'                     => 'post',
    'child_of'                 => $category->term_id,
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => FALSE,
    'hierarchical'             => 1,
    'taxonomy'                 => 'category',
  ); 
  $child_categories = get_categories($args );
  if ( !empty ( $child_categories ) ){
    foreach ( $child_categories as $child_category ){
        $category_list[] = $child_category->term_id;
    }
  } 

  $category_list[] = $category->term_id;
  return $category_list;
}

function exclude_category_home( $query ) {
if ( $query->is_home() && $query->is_main_query() ) {
  $query->set( 'category__not_in', get_success_stories_terms_ids() );
}
  return $query;
}
add_filter( 'pre_get_posts', 'exclude_category_home' );

// Homepage Success stories image crop

if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'hp_images_post_size', 360, 191, true ); //cropped
}


function retail_webinar_search($search, $wp_query) {
	global $wpdb;
	$seakey = $wp_query->get('search_prod_title');
	$search = "AND (($wpdb->posts.post_title LIKE '%$seakey%') OR ($wpdb->posts.post_content LIKE '%$seakey%'))";
    
    return $search;
}
