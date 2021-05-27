<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package steves_co
 */

get_header();
?>

	<main id="primary" class="site-main single-post-main">

		<section class="introduction-section">
			<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
		</section>

		<section class="content-section priority-section padded-section">
			<div class="container content-container">
				<div class="header-section" data-aos="fade-up" data-aos-duration="1000">
					<a href="/news" class="go-back">
						<div class="back-button arrow-button">
							<i class="arrow-right"></i>
							<span class="back-button-text button-text">&nbsp;</span>
						</div>
						<span class="section-title">News</span>
					</a>

					<h1 class="post-title"><?= the_title(); ?></h1>
				</div>

				<div class="text-section"  data-aos="fade-up" data-aos-duration="1000">
					<span class="post-publish-date">
						<?= get_the_date('d.m.Y'); ?>
					</span>

						<div class="post-content">
							<?= the_content(); ?>
						</div>
				</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
