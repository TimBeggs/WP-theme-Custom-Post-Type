<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Sophelle
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">
	<div class="section-inner thin error404-content py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="entry-title text-dark">Page Not Found</h1>
					<a href="<?php echo site_url();?>" class="btn btn-theme mt-5">Back to homepage</a>
			</div>
		</div>
	</div>
	</div>
</main>

<?php
get_footer();
