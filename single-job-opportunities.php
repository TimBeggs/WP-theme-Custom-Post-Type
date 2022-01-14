<?php
get_header();
?>

<main id="site-content" role="main">
<section class="main-content">
  <div class="container">   
  <div class="row">
    <div class="col-12 ">

    <?php
      the_content();
    ?>
  </div>
  </div>
  </div>
</section>
</main>
<?php get_footer(); ?>
