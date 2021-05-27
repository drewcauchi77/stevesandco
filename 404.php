<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package steves_co
 */

get_header();
$page = get_page_by_title('404', OBJECT, 'page');
$fields = get_fields($page->ID);

$mainFields = $fields['main_section'];
$imagesFields = $fields['background_gallery_images'];
$imageArr = array();

foreach($imagesFields as $image){
	$imageArr[] = 'url(' . $image['url'] . ')';
}

$imageList = implode(', ', $imageArr);

?>

	<main id="primary" class="site-main not-found-main">

		<section class="introduction-section" style="background-image: <?= $imageList; ?>;">
			<div class="introduction-outer-container">
				<div class="inner-section">
					<div class="container introduction-container">
						<div class="introduction-content">
							<h2 class="section-title"><?= $mainFields['tagline']; ?></h2>
							<h1 class="title"><?= $mainFields['title']; ?></h1>

							<div class="projects-button arrow-button">
								<a href="<?= $mainFields['page_link']; ?>">
									<i class="arrow-right"></i>
									<span class="projects-button-text button-text"><?= $mainFields['page_link_text']; ?></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
