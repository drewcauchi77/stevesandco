<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package steves_co
 */

get_header(); 

global $post;
global $wp_query;
$taxonomy = "Services";
//replace taxonomy with industry of true
if(is_tax('industrycat')){
$taxonomy = "Industry";
}

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
?>
<?php if ( have_posts() ) : ?>
<main id="primary" class="site-main single-taxonomy-main">
	<section class="introduction-section">
		<div class="introduction-outer-container">
			<div class="inner-section">
				<div class="container introduction-container">
					<div class="introduction-content">
						<h2 class="section-title"><?= $taxonomy; ?></h2>
						<h1 class="title"><?= $term->name; ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php if($terms->description){ ?>
	<section class="description-section padded-section priority-section">
		<div class="container">
			<div class="post-content content-container" data-aos="fade-up" data-aos-duration="1000">
				<?= $term->description; ?>
			</div>
		</div>
	</section>
	<?php } ?>
	<section class="taxonomy-project-list-section priority-section padded-section  no-pad-btm" id="filter">
		<div class="container project-list-container">
			<div class="projects-list" data-js-filter="target">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					?>
						<div class="single-project" data-aos="fade-up" data-aos-duration="1000">
							<a class="single-project-link" href="<?= get_permalink(); ?>">
								<div class="single-project-image-holder">
									<?php
										$asset = get_field("thumbnail_section");
										if($asset[0]['type'] == 'video'){
										?>
											<video class="thumbnail video" autoplay="autoplay" loop="loop" muted="muted" playsinline="">
												<source  src="<?= $asset[0]['url']; ?>" type="video/mp4">
											</video>
										<?php
										}	
										else{
											?><img class="thumbnail image" src="<?= $asset[0]['url'];; ?>" alt="<?= $asset[0]['alt']; ?>"><?php
										}
									?>
								</div>

								<div class="single-project-details">
									<div class="inner-details-container">
										<h3 class="single-project-title"><?= get_the_title(); ?></h3>

										<?php
											$categoriesArr = array();
											$industriesCategory = get_the_terms(get_the_ID(), 'industrycat');
											if($industriesCategory !== false){
												foreach($industriesCategory as $industryCategory){
													$categoriesArr[] = $industryCategory->name; 
												}
											}
											
											$servicesCategory = get_the_terms(get_the_ID(), 'servicecat');
											if($servicesCategory !== false){
												foreach($servicesCategory as $serviceCategory){
													$categoriesArr[] = $serviceCategory->name; 
												}
											}
											$categories = implode(', ', $categoriesArr);
										?>
										<div class="single-project-button arrow-button">
											<i class="arrow-right"></i>
											<span class="single-project-button-text button-text">&nbsp;</span>
										</div>

										<span class="single-project-categories"><?= $categories; ?></span>
									</div>
								</div>

								<div class="single-project-plus-button">
									<span class="plus-text">+</span>
								</div>
							</a>
						</div>
					<?php
				endwhile;
				the_posts_navigation();?>
			</div>
		</div>
	</section>			
	<section class="description-section padded-section-nd priority-section">
		<div class="container">
			<div class="featured-news-button arrow-button">
				<a href="/projects">
					<i class="arrow-right"></i>
					<span class="featured-news-button-text button-text">See all projects.</span>
				</a>
			</div>
		</div>
	</section>
</main><!-- #main -->
	<?php
else :
		$wp_query->is_404();

endif;
?>
<?php
get_footer();
