<?php
   /**
    * Template Name: Contact Us
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
<section class="c-contact-pg">
   <div class="container">
      <div class="row">
         <div class="col-xl-8 col-lg-8 col-12 col-sm-12 col-md-7 pr-lg-5">
            <h2 class="text-center text-md-left">
               <?php echo get_field('contact_form_heading',$post->ID);?>
            </h2>
            <p class="text-center text-md-left"><?php echo get_field('contact_form_sub_text',$post->ID);?></p>
            <div class="contact-form mt-4">
            <?php 
               echo do_shortcode(get_field('contact_form_shortcode',$post->ID));
               ?>
            </div>
         </div>
         <div class="col-xl-4 col-lg-4 col-12 col-sm-12 col-md-5">
            <div class="right-side-details">
               <div class="contact-details-top card-theme-box">
                  <h3 class="text-icon d-flex align-items-center mb-3"><span class="icon mr-3"></span><?php echo get_field('right_side_contact_heading',$post->ID);?></h3>
                  <p><?php echo get_field('right_side_contact_sub_text',$post->ID);?></p>
                  <?php if (get_field('phone_number_one','option') != '') {?>
                  <div class="card-light-box">
                     <h4>Call:</h4>
                     <a href="tel:<?php echo get_field('phone_number_one','option');?>" class="ph-n"><?php echo get_field('phone_number_one','option');?></a>
                     <p class="m-0">or toll-free at 855.SOPHELLE <a href="tel:<?php echo get_field('toll_free_number','option');?>"><?php echo get_field('toll_free_number','option');?></a></p>
                  </div>
                  <?php } ?>
                  <?php if (get_field('contact_email','option') != '') {?>
                  <div class="card-light-box">
                     <h4>Email: </h4>
                     <p class="m-0"><a href="mailto:<?php echo get_field('contact_email','option')?>"><?php echo get_field('contact_email','option')?></a></p>
                  </div>
                  <?php } ?>
               </div>
               <div class="contact-details-bottom">
                  <h3 class="title-w-divider">Offices</h3>
                  <div class="address-first">
                     <h4>Sophelle Corporate Headquarters</h4>
                     <address class="m-0">
                       <p class="m-0"> <?php echo get_field('contact_address_one','option')?></p>
                     </address>
                     <?php if (get_field('phone_number_one','option') != '') {?>
                     <p class="m-0">Phone: <a href="tel:<?php echo get_field('phone_number_one','option')?>"><?php echo get_field('phone_number_one','option')?></a></p>
                     <?php } ?>
                    <p class="m-0">or toll-free at 855.SOPHELLE <a href="tel:<?php echo get_field('toll_free_number','option');?>"><?php echo get_field('toll_free_number','option');?></a></p>
                  </div>
                  <div class="address-second">
                     <?php if (get_field('contact_address_two','option') != '') {?>
                     <h4><?php echo get_field('contact_address_two_heading','option')?></h4>
                     <address class="m-0">
                        <?php echo get_field('contact_address_two','option')?>
                     </address>
                     <?php } ?>
                     <?php if (get_field('phone_number_two','option') != '') {?>
                     <p class="m-0">Phone: <a href="tel:<?php echo get_field('phone_number_two','option')?>"><?php echo get_field('phone_number_two','option')?></a></p>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</main>
<?php get_footer();?>