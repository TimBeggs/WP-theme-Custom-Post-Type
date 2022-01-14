<?php  if(!is_page_template('templates/template-landing-page.php')) {?>
<footer class="c-footer bg-dark-theme">
   <div class="c-footer-contactdetails">
      <div class="container">
         <div class="row">
            <div class="col-xl-5 col-lg-4 col-md-6 col-12 col-sm-6">
               <div class="logo">
                  <span class="brand-name"><?php //echo get_field('footer_site_heading','option')?>
                     <img src="<?php echo get_field('footer_logo','option')?>">
                  </span>
               </div>
               <div class="row footer-contact">
                  <div class="col-xl-6">
                     <?php if (get_field('contact_address_one','option') != '') {?>
                     <h4><?php echo get_field('contact_address_one_heading','option')?></h4>
                     <address class="m-0">
                        <?php echo get_field('contact_address_one','option')?>
                     </address>
                     <?php } ?>
                     <?php if (get_field('phone_number_one','option') != '') {?>
                     <p class="m-0">Phone: <a href="tel:<?php echo get_field('phone_number_one','option')?>"><?php echo get_field('phone_number_one','option')?></a></p>
                     <?php } ?>
                     <?php if (get_field('contact_email','option') != '') {?>
                     <p class="m-0">Email: <a href="mailto:<?php echo get_field('contact_email','option')?>"><?php echo get_field('contact_email','option')?></a></p>
                     <?php } ?>
                  </div>
                  <div class="col-xl-6">
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
            <div class="col-xl-3 col-lg-4 col-md-6 col-12 col-sm-6 ">
               <div class="col-footer-menu">
                  <h3>Menu</h3>
                  <ul class="footer-link-list m-0">
                     <?php wp_nav_menu(
                     array(
                        'container'  => '',
                        'items_wrap' => '%3$s',
                         'menu'              => "Footer Menu", 
                     )
                      );?>
                  </ul>
               </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-12 col-sm-12  mt-sm-3 mt-lg-0">
               <h3>subscribe</h3>
               <p>Subscribe to our newsletter for the industry's latest news, events and insights.</p>
               <div class="subscribe-form">
                  <?php 
                  echo do_shortcode(get_field('footer_subscribe_from','option'));
                  ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="c-copyright">
      <div class="container">
         <div class="row">
            <div class="col-xl-6 col-12 col-sm-12 col-md-7">
               <p class="mb-sm-2 mb-md-0"><a href="<?php echo site_url('privacy-policy');?>">Privacy Policy</a> |  &copy; <?php echo date('Y');?> Sophelle All Rights Reserved.</p>
            </div>
            <div class="col-xl-6 col-12 col-sm-12 col-md-5">
               <?php
                  $social_media = get_field('social_media','option');
                ?>
               <ul class="social-media d-flex m-0">

                  <li>
                     <p class="m-0">Follow us:</p>
                  </li>
                  <?php if (!empty($social_media['facebook_url'])) { ?>
                    <li><a target="_blank" href="<?php echo $social_media['facebook_url'];?>" class="facebook"></a></li>
                  <?php } ?>
                  <?php if (!empty($social_media['youtube_url'])) { ?>
                    <li><a target="_blank" href="<?php echo $social_media['youtube_url'];?>" class="youtube"></a></li>
                  <?php } ?>
                  <?php if (!empty($social_media['twitter_url'])) { ?>
                    <li><a target="_blank" href="<?php echo $social_media['twitter_url'];?>" class="twitter"></a></li>
                  <?php } ?>
                  <?php if (!empty($social_media['linkedin_url'])) { ?>
                    <li><a target="_blank" href="<?php echo $social_media['linkedin_url'];?>" class="linkdin"></a></li>
                  <?php } ?>
               </ul>
            </div>
         </div>
      </div>
   </div>
</footer>
<?php } ?>
<!--------------------Footer End------------------->
</div>
</div>

<?php  wp_footer();?>

<script>
   var ajax_url = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
</script>
</body>