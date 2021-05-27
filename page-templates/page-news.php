<?php /* Template Name: News Page Template */

get_header();
$fields = get_fields();

$introductionFields = $fields['introduction_section'];
$featuredNewsFields = $fields['news_section']['featured_news'];
$recentNewsFields = $fields['news_section']['recent_news_list'];
?>

	<main id="primary" class="site-main news-main">
		<section class="introduction-section">
			<div class="introduction-outer-container">
				<div class="inner-section">
					<div class="container introduction-container">
						<div class="introduction-content">
							<h2 class="section-title"><?= $introductionFields['tagline']; ?></h2>
							<h1 class="title"><?= $introductionFields['title']; ?></h1>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="featured-news-section priority-section padded-section">
			<div class="featured-news-image-container" data-aos="fade-up" data-aos-duration="1000">
				<img src="<?= get_the_post_thumbnail_url($featuredNewsFields->ID); ?>" alt="<?= get_post_meta( get_post_thumbnail_id($featuredNewsFields->ID), '_wp_attachment_image_alt', true ); ?>">
			</div>

			<div class="container featured-news-details-container" data-aos="fade-up" data-aos-duration="1000">
				<div class="inner-details-container">
					<span class="post-publish-date section-title">
						<?= get_the_date('d.m.Y', $featuredNewsFields->ID); ?>
					</span>

					<h2 class="featured-news-title"><?= $featuredNewsFields->post_title; ?></h2>

					<p class="featured-news-excerpt"><?= get_the_excerpt($featuredNewsFields->ID); ?></p>

					<div class="featured-news-button arrow-button">
						<a href="<?= get_the_permalink($featuredNewsFields->ID); ?>">
							<i class="arrow-right"></i>
							<span class="featured-news-button-text button-text">Read more.</span>
						</a>
					</div>
				</div>
			</div>
		</section>

		<section class="news-listings-section priority-section padded-section">
			<div class="container news-listings-details-container">
				<div class="title-container" data-aos="fade-up" data-aos-duration="1000">
					<span class="recent-stories-title">More recent stories.</span>

					<div class="slider-navigation">
						<div class="arrow-button prev-button">
							<i class="arrow-right"></i>
						</div>

						<div class="arrow-button next-button">
							<i class="arrow-right"></i>
						</div>
					</div>
				</div>
			
				<div class="news-listings-content-slider" data-aos="fade-up" data-aos-duration="1000">
					<?php foreach($recentNewsFields as $news){ ?>

						<div class="single-news-listing">
							<div class="inner-details-container">
								<a href="<?= get_the_permalink($news['news_object']->ID); ?>" class="main-news-link">
									<div class="image-container">
										<img src="<?= get_the_post_thumbnail_url($news['news_object']->ID); ?>" alt="<?= get_post_meta( get_post_thumbnail_id($news['news_object']->ID), '_wp_attachment_image_alt', true ); ?>">
									</div>

									<span class="post-publish-date section-title">
										<?= get_the_date('d.m.Y', $news['news_object']->ID); ?>
									</span>

									<h2 class="featured-news-title">
										<?php if(strlen($news['news_object']->post_title) > 65){ 
											echo substr($news['news_object']->post_title, 0, 65) . '...';
										}else{
											echo $news['news_object']->post_title;
										} ?>
									</h2>

									<div class="featured-news-button arrow-button">
										<i class="arrow-right"></i>
										<span class="featured-news-button-text button-text">Read more.</span>
									</div>
								</a>
							</div>
						</div>

					<?php } ?>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();