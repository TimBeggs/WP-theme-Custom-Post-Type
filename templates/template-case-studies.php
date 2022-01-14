<?php
   /**
    * Template Name: Case Studies
    *
    * @package WordPress
    * @since 1.0
    */
   ?>
<?php get_header();
   $tag_list = get_field('tag_list');
   $available_tag_list = [];

    if (!empty($tag_list)) {
      foreach ($tag_list as $id) {
        $term = get_term( $id, 'post_tag' );
        $available_tag_list[$id.'_'.$term->slug] = $term->name;
        
      }
      natcasesort($available_tag_list);
    }

   if(have_posts()) { 
      the_post();
   }

   
                  
   $term = get_term( $value, 'post_tag' );
   $arr = array(
     'post_type' => 'post',
     'post_status' => 'publish', 
     'posts_per_page' => 6,
     'tag__in' => $tag_list,
   );
   
   $wp_query= NULL;
   $wp_query = new WP_Query( $arr );

   $totalPost = $wp_query->found_posts;
?>
<main id="site-content" role="main">
   <section class="c-case-std-sec-one">
      <div class="container">
         <?php if (get_field('case_std_content_sec_one_heading') != '' || get_field('case_std_content_sec_one_conetent') != '') {?>
         <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 text-center">
               <h2>
                  <?php echo get_field('case_std_content_sec_one_heading',$post->ID);?>
               </h2>
               <p class="mt-4"> <?php echo get_field('case_std_content_sec_one_conetent',$post->ID);?></p>
            </div>
         </div>
         <?php } ?>
         <!----------------------Success Stories--------------->
         <div class="row s-stories-list justify-content-center">
            <div id='' class='cat-buttons load-parTag my-4'>
               <a href='javascript:void(0)' class='active btn-theme-transparent' termID="">
               All</a>
               <?php 
                  if($available_tag_list) {
                    foreach($available_tag_list as $value => $title) {
                      $id = explode('_', $value)[0];
                      $slug = explode('_', $value)[1];
                      echo '<a href="javascript:void(0)" termID="'. $id .'" class="btn-theme-transparent">'. $title.'</a>';
                    } 
                  }
                  ?>
            </div>
            <div class="ajax-load">
               <ul class="d-flex flex-wrap p-0 mt-3 justify-content-center w-100" id="cat-list-gallery" live-termID="" total-post= '<?= $totalPost; ?>' par-page="9">
                  <?php
                     if($tag_list) {
                        while ( have_posts() ) : the_post();
                     
                        $tags= [];
                        $terms = wp_get_post_terms( $post->ID, 'post_tag' );
                           foreach ( $terms as $term ) {
                           $tags[] = $term->slug;
                           }
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
                     } else {
                     echo '<p>Sorry, no posts matched your criteria</p>';
                     }
                     ?>
               </ul>
            </div>
            <!-- Pagination //Start -->
              <div class="col-12">
                <div class="c-pagination">
                  <nav class="mb-5 pagination ajax-loadMore" role="navigation">
                    <a class="btn btn-theme m-auto" href="javascript:void(0)" live-page="6">Load More</a>
                  </nav>
                </div>
              </div>
         </div>
         <!---------------Latest success stories sub catg posts----------->
         <div class="row justify-content-center stories-list mt-4">
            <?php 
              $category = get_term_by('slug', 'success-stories', 'category');
              $parent_cat_id   = $category->term_id;

               $sub_cat_terms = get_terms([
                   'taxonomy' => 'category',
                   'hide_empty' => true,
                   'parent' => $parent_cat_id,
                   'orderby'    => 'term_id'
                 ]);
               
                 foreach($sub_cat_terms as $sub_cat_term) {
               
                    $subcat_id   = $sub_cat_term->term_id;
               
                   echo '<div class="col-lg-3 col-12 col-sm-6 sub-cat-items">
                     <div class="card-gray-box">
                   ';
                     echo '<h5>' . $sub_cat_term->name . '</h5>';
                    
                     $posts = new WP_Query(
                     array(
                         'post_type' => 'post',
                         'post_status' => 'publish',
                         'posts_per_page' => 4,
                         'hide_empty'     => true,
                         'order'          => 'ASC',
                         'tax_query' => array(
                           array(
                               'taxonomy' => 'category',
                               'field' => 'id',
                               'terms'    => $subcat_id,
                           )
                         )
                       )
                   );
               
                 // If there are posts available within this subcategory
                 if ( $posts->have_posts() ):
                     ?>
              <ul>
               <?php
                  while ( $posts->have_posts() ): $posts->the_post();
                ?>
               <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
               <?php endwhile; ?>
            </ul>
            <?php
               else:
                   echo 'No posts found';
               endif;
               
               wp_reset_query();
               
                 echo '</div></div>';
               }

               ?>
         </div>
      </div>
      </div>
   </section>
   <?php get_template_part( 'template-parts/lets-talk' ); ?>
   <?php if (get_field('focus_report_content') != '' || get_field('focus_report_image') != '') {?>
   <section class="c-focus-report">
      <div class="container">
         <div class="row align-items-center justify-content-center">
            <?php 
               $report_link_btn = get_field('focus_report_content_button');
               $link_url= '';
               if( $report_link_btn ){ 
                   $link_url = $report_link_btn['url'];
                   $link_title = $report_link_btn['title'];
                   $link_target = $report_link_btn['target'] ? $report_link_btn['target'] : '_self';
                 }
                $no_image = (get_field('focus_report_image', $post->ID) == '') ? 0 : 1;
                $class_name = (get_field('focus_report_image', $post->ID) == '') ? 'col-xl-12 text-center':'col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6';?>
            <?php if ($no_image > 0) {?>
            <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6">
               <img src="<?php echo get_field('focus_report_image',$post->ID);?>" alt="">
            </div>
            <?php } ?>
            <div class="<?php echo $class_name;?>">
               <div class="module-content">
                  <?php echo get_field('focus_report_content',$post->ID);?>
                  <?php if( $report_link_btn ): ?>
                  <a class="btn-theme" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php } ?>
</main>
<?php get_footer();?>