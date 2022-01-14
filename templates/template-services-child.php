<?php
  /**
   * Template Name: Service Child Page
   *
   * @package WordPress
   * @since 1.0
   */
  ?>
<?php get_header();
  if(have_posts()) { 
  the_post();
  }?>
<main id="site-content" role="main">
  <?php if (get_field('servc_content_sec_one_heading') != '' || get_field('servc_content_sec_one_content') != '') {?>
  <section class="c-servc-content-one srvchild-pg-content">
    <div class="container">
      <?php if (get_field('servc_content_sec_one_heading') != '') {?>
      <div class="row justify-content-center align-items-center">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 text-center">
          <h2>
            <?php echo get_field('servc_content_sec_one_heading',$post->ID);?>
          </h2>
        </div>
      </div>
      <?php } ?>
      <?php if (get_field('servc_content_sec_one_content') != '') {?>
      <div class="row services-list justify-content-center">
        <?php
          // check if the repeater field has rows of data
          if( have_rows('servc_content_sec_one_content',$post->ID) ):
          // loop through the rows of data
          while ( have_rows('servc_content_sec_one_content',$post->ID) ) : the_row();
           ?>
        <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6 sc-item">
          <div class="card-box-shadow">
            <h3>
              <?php if (get_sub_field('icon') != '') {?>
              <span class="icon-img">
              <img src="<?php echo get_sub_field('icon',$post->ID);?>" alt="">
              </span>
              <?php } ?>
              <span class="heading"><?php echo get_sub_field('title',$post->ID);?></span>
              <div class="clearfix"></div>
            </h3>
            <?php echo get_sub_field('content',$post->ID);?>
          </div>
        </div>
        <?php 
          endwhile;
          else :
            // no rows found
          endif;
          ?>
      </div>
      <?php } ?>
    </div>
  </section>
  <?php } ?>
  <?php if (get_field('servc_content_sec_two_content') != '') {?>
  <section class="c-servc-content-two p-0">
    <div class="container">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('servc_content_sec_two_content',$post->ID) ):
        // loop through the rows of data
        while ( have_rows('servc_content_sec_two_content',$post->ID) ) : the_row();
        
        $no_left_image = (get_sub_field('servc_content_sec_two_image', $post->ID) == '') ? 0 : 1;
        $class_name = (get_sub_field('servc_content_sec_two_image', $post->ID) == '') ? 'col-xl-10 text-center':'col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6 col-order-text';
         ?>
      <div class="row two-row-bg justify-content-center align-items-center">
        <?php if ($no_left_image > 0) {?>
        <div class="col-xl-6 col-12 col-sm-12 col-md-6 col-lg-6 col-order-img">
          <?php if (get_sub_field('servc_content_sec_two_image') != '') {?>
          <img src="<?php echo get_sub_field('servc_content_sec_two_image',$post->ID);?>" alt="">
          <?php } ?>
        </div>
        <?php } ?>
        <div class=" <?php echo $class_name;?>">
          <div class="module-content">
            <h3><?php echo get_sub_field('servc_content_sec_two_heading',$post->ID);?></h3>
            <?php echo get_sub_field('servc_content_sec_two_content',$post->ID);?>
          </div>
        </div>
      </div>
      <?php 
        endwhile;
        else :
          // no rows found
        endif;
        ?>
    </div>
  </section>
<?php } ?>
<?php if (get_field('servc_left_side_content') != '' || get_field('servc_right_side_content') != '') {?>
  <section class="c-servc-content-one">
    <div class="container">
      <div class="row justify-content-center">
          <?php $no_content = (get_field('servc_right_side_content', $post->ID) == '') ? 0 : 1;
            $class_name_content = (get_field('servc_right_side_content', $post->ID) == '') ? 'col-xl-11 text-center':'col-xl-5 col-12 col-sm-12 col-md-6 col-lg-6';
          ?>
        <div class="<?php echo $class_name_content;?>">
          <div class="module-content">
            <?php echo get_field('servc_left_side_content',$post->ID);?>
          </div>
        </div>

        <?php if ($no_content > 0) {?>
        <div class="col-xl-7 col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="module-content">
            <div class="card-gray-box">
            <?php echo get_field('servc_right_side_content',$post->ID);?>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <?php } ?>
</main>
<?php get_footer();?>