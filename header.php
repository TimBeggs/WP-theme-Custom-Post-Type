<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
  <head>
    <title><?php echo  wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <script>
      // var url = window.location.pathname;
      // console.log(url);  
      // if(url.indexOf('retail-solutions') >= 0 && url.indexOf('page') == -1 && url != "/sophelle/retail-solutions/"){
      //   console.log(url.indexOf('page'));  
      //   window.location.href = window.location.protocol + "//" + window.location.host + '/sophelle/retail-solutions/';
      // }
    </script>
    <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-K8GBN2Z');</script>
    <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="page">
    <div class="content">
      <div class="header-sec">
        <header class="o-header c-header">
          <div class="header-content">
              <div class="container">
                <div class="row align-items-center">
                  <div class="c-header-left">
                    <div class="logo">
                  <?php  if(!is_page_template('templates/template-landing-page.php')) {?>
                      <a class="nav-brand m-0" href="<?php echo site_url(); ?>" alt="Sophelle">
                        <img src="<?php echo get_field('header_logo','option');?>" class="header-logo" />
                        <img src="<?php echo get_field('header_sticky_logo','option');?>" class="header-sticky-logo" />
                      </a>
                      <?php } else { ?>

                      <img src="<?php echo get_field('header_logo','option');?>" class="header-logo" />

                      <?php }?>
                    </div>
                  </div>
                   <?php  if(!is_page_template('templates/template-landing-page.php')) {?>
                  <div class="c-header-right">
                    <div class="navbar navbar-right p-0">
                      <ul>
                        <?php wp_nav_menu(
                          array(
                            'container'  => '',
                            'items_wrap' => '%3$s',
                            'menu'              => "Main Menu", 
                          )
                          );?>
                      </ul>
                      <span class="search-btn res-search-btn"><a href="javascript:void(0)"></a></span>
                    </div>
                    <!--------------SEARCH--------------->
                    <div class="h_search header-top-search">
                      <div class="search_content">
                        <?php dynamic_sidebar('header-top-search'); ?>
                      </div>
                    </div>

                  </div>
                  <?php } ?>
                </div>
              </div>
          </div>
        </header>
    <!------------------------Sticky Menu-------->
        <div class="c-header-stickymenu">
        </div>
      </div>
    <!------------------------Internal Banner-------------->
    <?php  $post_id = $post->ID;

      if (is_home() || is_search()) {

        $post_id = get_option( 'page_for_posts' );

      } else if (is_archive()) {

        $page_obj = get_page_by_path(get_query_var('post_type'), OBJECT, 'page');
        $post_id = $page_obj->ID;

      }

    if (is_search()) {
		$solid_bg = (get_field('internal_banner_image',$post_id) != '') ? 'url('. get_field('internal_banner_image',$post_id).') no-repeat top center/cover' : '#053265';
       ?>
      <section class="c-internal-banner overlay-theme-bg" 
      style="background:<?php echo $solid_bg;?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-12 text-center">
            <div class="banner__body">
              <h1 class="banner-title">Search Results for: <?php echo $_GET['s'];?></h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php 
    } else if(is_singular('post')){
      $solid_bg = (get_field('blog_posts_banner_bg_img','option') != '') ? 'url('. get_field('blog_posts_banner_bg_img','option').') no-repeat top center/cover' : 'url(/wp-content/uploads/2021/04/advertise-business-social-media-start.jpg) no-repeat top center/cover';
    ?>
    <section class="c-internal-banner overlay-theme-bg" 
      style="background:<?php echo $solid_bg;?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-12 text-center">
            <div class="banner__body">
              <h1 class="banner-title">
                <?php echo (get_field('blog_posts_banner_heading','option') != '') ? get_field('blog_posts_banner_heading','option') : get_the_title($post_id);?>
                </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
   <?php } 
   else if(is_category() || is_tax('webinar_category') || is_tax('webinar_organizer')||is_tax('podcast-category')){
      $solid_bg = 'url(/wp-content/uploads/2021/05/pexels-kaboompics-com-6224-scaled-1.jpg) no-repeat top center/cover';
    ?>
    <section class="c-internal-banner overlay-theme-bg" 
      style="background:<?php echo $solid_bg;?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-12 text-center">
            <div class="banner__body">
              <h1 class="banner-title">
               <?php echo get_queried_object()->name ?>
              </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
   <?php }
    else if(!is_front_page() && !is_page_template( 'templates/template-landing-page.php')){
    $solid_bg = (get_field('internal_banner_image',$post_id) != '') ? 'url('. get_field('internal_banner_image',$post_id).') no-repeat top center/cover' : 'url(/wp-content/uploads/2021/04/advertise-business-social-media-start.jpg) no-repeat top center/cover';
    ?>
    <section class="c-internal-banner overlay-theme-bg" 
      style="background:<?php echo $solid_bg;?>">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 col-12 text-center">
            <div class="banner__body">
              <h1 class="banner-title">
              <?php if(is_archive('archive-retail-solutions')){ ?>
                  Retail Solutions
              <?php  } else {
                  echo (get_field('internal-banner-heading',$post_id) != '') ? get_field('internal-banner-heading',$post_id) : get_the_title($post_id);
               }  ?>

                </h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php } ?>