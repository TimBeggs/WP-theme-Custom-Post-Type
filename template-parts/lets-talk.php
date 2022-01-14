<?php
/**
 * Displays Lets Talk section
**/

?>
<?php if (get_field('lets_talk_us_Heading') != '') {?>
<section class="c-ab-content-md-three overlay-theme-bg c-lets-talk" style="background: url('<?php echo (get_field('lets_talk_us_background_image',$post->ID) != '') ? get_field('lets_talk_us_background_image',$post->ID) : '';?>') no-repeat top center/cover;">

  <div class="container">
    <div class="row align-items-center text-md-left text-center">
      <div class="col-xl-4 col-sm-12 col-12 col-md-5 pr-lg-5">
        <h2><?php echo get_field('lets_talk_us_Heading',$post->ID);?></h2>
        <h3 class="mt-3 mb-0"><?php echo get_field('lets_talk_us_sub_heading',$post->ID);?></h3>
      </div>
      <div class="col-xl-8 col-sm-12 col-12 col-md-7 l-border-theme-light">
        <h5><?php echo get_field('lets_talk_us_content',$post->ID);?></h5>
        <?php 
        $link = get_field('lets_talk_us_button');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="btn-theme mt-lg-4 mt-3" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>