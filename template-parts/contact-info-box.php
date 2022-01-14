<?php
   /**
    * Displays Contact sidebar box
   **/
   ?>
<div class="widget widget_text">
   <div class="card-theme-box cust-post-side">
      <h3 class="text-icon d-flex align-items-center mb-3">
         <span class="icon mr-3"></span><?php echo get_field('contact_info_box_heading','option')?>
      </h3>
      <p><?php echo get_field('contact_info_box_content','option')?></p>
      <?php if (get_field('contact_info_box_phone_number','option') != '') {?>
      <div class="card-light-box text-left">
         <h4>Our Phone:</h4>
         <a href="tel:<?php echo get_field('contact_info_box_phone_number','option')?>" class="ph-n">
         <?php echo get_field('contact_info_box_phone_number','option')?></a>
      </div>
   <?php } ?>
   <?php if (get_field('contact_info_box_phone_number','option') != '') {?>
   <div class="card-light-box text-left">
      <h4> Our Email: </h4>
      <a href="mailto:<?php echo get_field('contact_info_box_email','option')?>"><?php echo get_field('contact_info_box_email','option')?></a>
   </div>
   <?php } ?>
</div>
</div>