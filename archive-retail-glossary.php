<?php
  /**
   * Template Name: Retail Glossary
   *
   * @package WordPress
   * @since 1.0
   */
  ?>
<?php get_header();

  $glossary_page_obj = get_page_by_path('retail-glossary', OBJECT, 'page');

  $glossary_page_id = $glossary_page_obj->ID;
  $glossary_page_content = $glossary_page_obj->post_content;


  if(have_posts()) { 
  the_post();
}?>
<main id="site-content" role="main">

  <?php if ( $glossary_page_content != '') {?>
    <section class="c-rr-sec-content pb-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <?php echo $glossary_page_content ?>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <section class="c-retail-r-glossary">
    <div class="container">
      <!---------------------PODCAST POSTS---------------->
      <div class="row r-glossary">

        <?php

        $char_arr = [];
        $wp_query = new wp_query(
          array(
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page'=>-1,
                'post_type' => 'retail-glossary'
            )
          );

         if ( $wp_query->have_posts() ) {
           while ( $wp_query->have_posts() ) {
              $wp_query->the_post();
              $this_char = mb_strtoupper(mb_substr($post->post_title,0,1));
              $char_arr[$this_char][]= $post->ID;
            }
        }?>

          <?php 

            if(!empty($char_arr)) {
               echo '<div id="list-cat-buttons" class="cat-buttons glossary-cat-buttons mb-5 col-lg-12">';
               echo '<a href="javascript:void(0);" class="btn-theme-transparent active" data-cat="all">All</a>';
                $letters = array_keys($char_arr);
                foreach ($letters as $letter) {
                  echo '<a href="#'.$letter.'" class="btn-theme-transparent" data-cat="'.$letter.'">'.$letter.'</a>';
                }
                echo "</div>";

                echo '<ul class="d-flex flex-wrap p-0" id="cat-list-gallery">';
                foreach($char_arr as $word => $arr) {
                  echo '<h2 class="item '.$word.'">'.$word.'</h2>';
                  foreach ($arr as $id) {
                    echo '<li class="item '.$word.'">';
                    echo '<a href="'.get_permalink($id).'" class="d-inline-block p-1">
                    '.get_the_title($id).'</a>';
                    echo '</li>';
                  }
                }
                echo '</ul>';
              } else {
                esc_html_e( 'Sorry, no posts found.' ); 
              }

          ?>

      </div>
    </div>
  </section>
</main>
<?php get_footer();?>