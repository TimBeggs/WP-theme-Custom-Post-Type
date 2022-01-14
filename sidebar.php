<?php if (is_singular('post')) {
  dynamic_sidebar('blog-details-sidebar');
}else if (is_singular('sophelle-podcast')){
  dynamic_sidebar('podcast-sidebar');
}else if (is_singular('sophelle-webinars')){
  dynamic_sidebar('webinar-sidebar');
}else {
  dynamic_sidebar('blog-sidebar');
}
?>

<?php //get_template_part( 'template-parts/contact-info-box' ); ?>